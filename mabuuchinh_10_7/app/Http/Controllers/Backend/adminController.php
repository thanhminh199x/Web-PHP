<?php


namespace App\Http\Controllers\Backend;
use Illuminate\Pagination\LengthAwarePaginator;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Cell;
use App\Models\tinh;
use App\Models\huyen;
use App\Models\chitiet;
use App\Models\TinhChitiet;
use App\Models\nhatky;
use App\Models\User;
use App\Models\Vidu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Hash;
class adminController extends Controller
{
    public function getindex(){
        return view('backend.index');
    }

    public function diary(){
        $data = nhatky::paginate(30);
        return view('backend.diary',compact('data'));
    } 

    public function manage_account(){
        $data = User::paginate(20);
        return view('backend.manageAcc',compact('data'));
    } 

    public function setting_account(){
       
        return view('backend.settingAcc');
    }

    public function update_account(Request $request){
        $this->validate($request,[
            'email'=>'unique:users,email'
        ],
        [
            
            'email.unique'=>'Email này đã trùng với tài khoản khác'
        ]);

        User::where('id',$request->id)->update(['name'=>$request->name,'email'=>$request->email]);
        return redirect()->back();
    }

    public function deleteAcc(Request $request){
        $id = $request->id;
        User::where('id',$id)->delete();
        return redirect()->route('admin.manage_account');
    }  

    public function add_account(){
      
        return view('backend.addAcc');
    } 

    public function createAcc(Request $request){
        $this->validate($request,[
            'email'=>'email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'repassword'=>'required|same:password'
        ],
        [
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email này đã thuộc về 1 tài khoản',
            'name.required'=>'Hãy nhập tên cán bộ',
            'password.min'=>'Mật khẩu tối đa 6 ký tự',
            'password.max'=>'Mật khẩu không quá 20 ký tự',
            'password.required'=>'Mật khẩu không không được để trống',
            'repassword.same'=>'Mật khẩu không khớp',
            'repassword.required'=>'Hãy nhập lại mật khẩu'
        ]);

        $name= $request->name;
        $email= $request->email;
        $password= $request->password;
        $role= $request->role;

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->role = $role;
        $user->password = bcrypt($password);
        $user->save();

        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function updateRole(Request $request){
        $id = $request->id;
        User::where('id',$id)->update(["role"=>$request->role]);
        return redirect()->route('admin.manage_account');
    }

    public function getAcc(Request $request){
      $keyword = strval($request->query);
      $data = User::where('name','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->select('email')->get()->toArray();
      return json_encode($data);
    }

    public function searchAcc(Request $request){
      $keyword = $request->keyword;
      $data = User::where('name','like','%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->get();
      return view('backend.searchAcc',compact('data'));
    }

    public function changePass(Request $request){
      

          if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
              // The passwords matches
              return redirect()->back()->with("error","Mật khẩu nhập không khớp với mật khẩu cũ.Xin nhập lại !");
          }
          if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
              //Current password and new password are same
              return redirect()->back()->with("error","Mật khẩu mới không thể trùng với mật khẩu cũ. Hãy nhập lại mật khẩu khác !");
          }
          $validatedData = $request->validate([
              'current-password' => 'required',
              'new-password' => 'required|string|min:6|confirmed',
          ]);
          //Change Password
          $user = Auth::user();
          $user->password = bcrypt($request->get('new-password'));
          $user->save();
          return redirect()->back()->with("thanhcong","Đổi mật khẩu thành công !");
      
   }


    public function import_excels(Request $request){
        return view('backend.import');
    }

    public function import_excel(Request $req){
        $this->validate($req,[
            'select_file'=>'required|mimes:xls,xlsx'
        ],
        [
           
            
            'select_file.required'=>'Hãy nhập 1 file Excel',
            'select_file.mimes'=>'Hãy chọn đúng file đuôi xls hoặc xlsx'

        ]);

      $filename = $req->file('select_file')->getRealPath();

      $inputFileType = PHPExcel_IOFactory::identify($filename);
      $objReader = PHPExcel_IOFactory::createReader($inputFileType);

      $objReader->setReadDataOnly(true);

      $objPHPExcel = $objReader->load("$filename");

      $total_sheets=$objPHPExcel->getSheetCount();

      $allSheetName=$objPHPExcel->getSheetNames();
      $objWorksheet  = $objPHPExcel->setActiveSheetIndex(0);
      $highestRow    = $objWorksheet->getHighestRow();
      $highestColumn = $objWorksheet->getHighestColumn();
      $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
      $arraydata = array();
      for ($row = 6; $row <= $highestRow;++$row)
      {
        for ($col = 0; $col <$highestColumnIndex;++$col)
        {
          $value=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
          $arraydata[$row-2][$col]=$value;
        }
      }

    
        $id_tinh = $arraydata[4][0];
        $dem = count($arraydata);
        for ($i=5; $i<$dem ; $i++) { 
            $tinh = $arraydata[$i][0];
            $quan = $arraydata[$i][1];
            $dtgm = $arraydata[$i][2];
            $diachi = $arraydata[$i][5];
            $them = $arraydata[$i][6];
            $sua = $arraydata[$i][7];
            $xoa = $arraydata[$i][8];
            //Tỉnh
            if($tinh==null&&$quan==null&&$dtgm!=null){

               if($them!=null&&$sua==null&&$xoa==null){
                 $add = new TinhChitiet();
                 $add->dt_gan_ma = $arraydata[$i][2];
                 $add->ten = $arraydata[$i][3];
                 $add->mabc = $arraydata[$i][4];
                 $add->id_tinh = $id_tinh;
                 $add->save();
                 
               }elseif($sua!=null&&$them==null&&$xoa==null){
                 $update = TinhChitiet::where([['dt_gan_ma',$dtgm],['id_tinh',$id_tinh]])->update([
                    'dt_gan_ma'=>$dtgm,'ten'=>$arraydata[$i][3],'mabc'=>$arraydata[$i][4],'id_tinh'=>$id_tinh,
                    'data3'=>$diachi
                 ]);
               }elseif($xoa!=null&&$sua==null&&$them==null){
                 $delete = TinhChitiet::where([['dt_gan_ma',$dtgm],['id_tinh',$id_tinh]])->delete();
               }
            }
            //Quận, huyện
            if($tinh==null&&$quan!=null&&$dtgm!=null){
               $data = huyen::where([['quan',$quan],['id_tinh',$id_tinh]])->get()->toArray();
               $id_huyen = $data[0]['id'];

               if($them!=null&&$sua==null&&$xoa==null){
                    $add = new chitiet();
                    $add->doi_tuong_gan = $arraydata[$i][2];
                    $add->ten = $arraydata[$i][3];
                    $add->mabc = $arraydata[$i][4];
                    $add->id_huyen = $id_huyen;
                    $add->save();
               }
               if($sua!=null&&$them==null&&$xoa==null){
                $update = chitiet::where([['id_huyen',$id_huyen],['doi_tuong_gan',$dtgm]])->update([
                    'doi_tuong_gan'=>$dtgm,'ten'=>$arraydata[$i][3],'mabc'=>$arraydata[$i][4]
                 ]);
               }
               if($xoa!=null&&$sua==null&&$them==null){
                    
                   $delete = chitiet::where([['doi_tuong_gan',$dtgm],['id_huyen',$id_huyen]])->delete();
               }
            }
        }

        $diary = new nhatky();
        $diary->name = Auth::user()->name;
        $diary->email = Auth::user()->email;
        $diary->action = 'Đã cập nhật bằng Excel ';
        $diary->save();

        return redirect()->back()->with('thanhcong','Import thành công !');
 
    }

   public function getTinh(request $request){
        if(isset($request->search)){

            $value=$request->search;
            $arr=explode('-',$value);
            $value1=$arr[count($arr)-1];
            $value2=$arr[0];
            $tinhs=tinh::where('mabc','LIKE',"%".$value2."%")->orWhere('mabc',$value2)->paginate(20);
        }else{
            $tinhs=tinh::paginate(20);
           
        }
       return view('backend.tinh',compact('tinhs'));


       
    }
    public function addTinh(){
        return view('backend.addTinh');
    }

    public function PostaddTinh(request $request){
        $this->validate($request,[
            'vung'=>'unique:bc_tinh,vung',
            'mabc'=>'unique:bc_tinh,mabc'
            
        ],
        [
           
            'vung.unique'=>'Vùng này đã thuộc về 1 tỉnh khác',
            'mabc.unique'=>'Mã bưu chính này đã thuộc về 1 tỉnh khác'
        ]);
        
        $data=$request->only('vung','ten','mabc','data1','data2','data3','data4','data5');

        tinh::create($data);

        $diary = new nhatky();
        $diary->name = Auth::user()->name;
        $diary->email = Auth::user()->email;
        $diary->action = 'Đã thêm tỉnh '.$request->ten.' mã bưu chính '.$request->mabc;
        $diary->save();
        return redirect()->back()->with('thanhcong','Thêm mới tỉnh thành công');

        
    }


    public function editTinh($id){
        $tinh=tinh::findORFail($id);
        return view('backend.editTinh',compact('tinh'));
    }


    
    public function postEditTinh($id, request $request){

        $tinh=tinh::findORFail($id);
        $data=$request->only('vung','ten','ten_eng','mabc','data1','data2','data3','data4','data5');
        $tinh->update($data);

        if(strlen($request->mabc)==2){
            $data2 = TinhChitiet::where('id_tinh',$id)->get()->toArray();
            $count = count($data2);
            for ($i=0; $i <$count ; $i++) { 
               $id2 = $data2[$i]['id'];
               $mabc = $data2[$i]['mabc'];
               $num = intval(substr($mabc,2,4));
               $newnum = $request->mabc*1000+$num;
               TinhChitiet::where('id',$id2)->update(['mabc'=>$newnum]);
            }

            $data3 = huyen::where('id_tinh',$id)->get()->toArray();
            $count2 = count($data3);
            for ($i=0; $i <$count2 ; $i++) { 
               $id3 = $data3[$i]['id'];
               $mabc = $data3[$i]['mabc'];
               $newnum = str_replace($request->code, $request->mabc, $mabc);
               huyen::where('id',$id3)->update(['mabc'=>$newnum]);
            }

            for ($i=0; $i < $count2 ; $i++) { 
               $idhuyen = $data3[$i]['id'];
               $data = chitiet::where('id_huyen',$idhuyen)->get()->toArray();
               $count = count($data);
               for ($j=0; $j < $count; $j++) { 
                   $idchitiet = $data[$j]['id'];
                   $mabc = $data[$j]['mabc'];
                   $newnum = str_replace($request->code, $request->mabc, $mabc);
                   chitiet::where('id',$idchitiet)->update(['mabc'=>$newnum]);
               }
            }
        }elseif(strlen($request->mabc)>2){
        
            $arr = explode('-', $request->mabc);
            $data = TinhChitiet::where('id_tinh',$id)->get()->toArray();
            $count = count($data);
            $code = round(count($data)/10000);
            for ($j=0; $j < count($arr); $j++) { 
                $mbc = $arr[$j];
                 for ($i=0; $i < 10000 ; $i++) { 
                     $id2 = $data2[$i]['id'];
                     $mabc = $data2[$i]['mabc'];
                     $num = intval(substr($mabc,2,4));
                     $newnum = $mbc*1000+$num;
                     TinhChitiet::where('id',$id2)->update(['mabc'=>$newnum]);
                }
            }
          
        }
       
        $diary = new nhatky();
        $diary->name = Auth::user()->name;
        $diary->email = Auth::user()->email;
        $diary->action = 'Đã cập nhật thông tin tỉnh '.$request->ten.' mã bưu chính '.$request->mabc;
        $diary->save();

        return redirect('admin/tinh');
       
    }
    public function deleteTinh($id){
        $tinh = tinh::where('id',$id)->get()->toArray();
        $diary = new nhatky();
        $diary->name = Auth::user()->name;
        $diary->email = Auth::user()->email;
        $diary->action = 'Đã xóa tỉnh '.$tinh[0]['ten'].' mã bưu chính '.$tinh[0]['mabc'];
        $diary->save();
        tinh::destroy($id);

        return redirect('admin/tinh');
    }


    //huyen
    public function getHuyen(request $request){

        if(isset($request->search)){

            $value=$request->search;
            $arr=explode('-',$value);
            $value=$arr[count($arr)-1];
            $value2=$arr[0];
            $huyens=huyen::where('mabc','LIKE',"%".$value2."%")->orWhere('mabc',$value2)->paginate(20);
            dd($huyens);
            
            
        }else{
            $huyens=huyen::orderBy('id_tinh', 'asc')->paginate(20);
        }
        return view('backend.huyen',compact('huyens'));
    }
    
    public function editHuyen($id){
        
        $huyen=huyen::findORFail($id);
        return view('backend.editHuyen',compact('huyen'));
    }
    public function postEditHuyen($id, request $request){
        $request->validate([
            'id_tinh'=>'required',
        ],[
            'id_tinh.required'=>'Nhập đúng tên tỉnh',
        ]);
        $value=$request->id_tinh;
        $arr=explode('-',$value);
        $value=$arr[count($arr)-1];
        $value2=$arr[0];
        $data1=tinh::where('ten',$value)->orWhere('mabc',$value2)->firstOrFail();

        $huyen=huyen::findORFail($id);
        $data=$request->only('quan','ten','ten_eng','mabc','data1','data2','data3','data4','data5');
        $data['id_tinh']=$data1->id;
        $huyen->update($data);
        $diary = new nhatky();
        $diary->name = Auth::user()->name;
        $diary->email = Auth::user()->email;
        $diary->action = 'Đã cập nhật thông tin huyện '.$request->ten.' mã bưu chính '.$request->mabc;
        $diary->save();
        return redirect('admin/huyen');
    }
    public function deleteHuyen($id){
        $huyen = huyen::where('id',$id)->get()->toArray();
        $diary = new nhatky();
        $diary->name = Auth::user()->name;
        $diary->email = Auth::user()->email;
        $diary->action = 'Đã xóa huyện '.$huyen[0]['ten'].' mã bưu chính '.$huyen[0]['mabc'];
        $diary->save();
        huyen::destroy($id);
        return redirect('admin/huyen');
    }
    public function addHuyen(){
        return view('backend.addHuyen');
    }
    public function PostaddHuyen(request $request){
        $request->validate([
            'id_tinh'=>'required',
        ],[
            'id_tinh.required'=>'Nhập đúng tên tỉnh',
        ]);

        $value=$request->id_tinh;
        $arr=explode('-',$value);
        $value=$arr[count($arr)-1];
        $value2=$arr[0];
        $data1=tinh::where('ten',$value)->orWhere('mabc',$value2)->firstOrFail();
        
        $data=$request->only('quan','ten','mabc','data1','data2','data3','data4','data5');
        $data['id_tinh']=$data1->id;
        huyen::create($data);
        $diary = new nhatky();
        $diary->name = Auth::user()->name;
        $diary->email = Auth::user()->email;
        $diary->action = 'Đã thêm huyện '.$request->ten.' mã bưu chính '.$request->mabc;
        $diary->save();
        return redirect('admin/huyen');
    }


    //Đối tượng gắn mã
    public function getHuyenChiTiet(request $request){

        if(isset($request->search)){
            $tinh = tinh::all();
            $value=$request->search;
            $arr=explode('-',$value);
            $value=$arr[count($arr)-1];
            $value2=$arr[0];
            $chitiets=chitiet::where('ten_eng','LIKE',"%".$value."%")->orWhere('mabc',$value2)->get()->toArray();
            $chitiets2=TinhChitiet::where('ten_eng','LIKE',"%".$value."%")->orWhere('mabc',$value2)->get()->toArray();
            if($chitiets!= null || $chitiets2 != null){
            return view('backend.huyenchitiet',compact('chitiets','chitiets2','tinh'));
            }else{
              return redirect()->back();
            }

        }else{

          $tinh = tinh::all();
          if(!isset($request->id_tinh)){
            $value = 1;
          }else{
             $value=$request->id_tinh;
          }
        
          $id_tinh = tinh::where('id',$value)->get()->toArray();
          $ten_tinh = $id_tinh[0]['ten'];
          $arrhuyen = [];
          $arrtinh = [];
          $arr = [];
          
          $tinhchitiet = TinhChitiet::where('id_tinh',$value)->orderBy('mabc','asc')->get()->toArray();
          array_push($arrtinh, $tinhchitiet);
          $id_huyen = huyen::select('id')->where('id_tinh',$value)->get()->toArray();
          for ($j=0; $j < count($id_huyen); $j++) { 
           $huyenchitiet = chitiet::where('id_huyen',$id_huyen[$j]['id'])->orderBy('mabc','asc')->get()->toArray();
           array_push($arrtinh, $huyenchitiet);
           }

           $currentPage = LengthAwarePaginator::resolveCurrentPage();

           $itemCollection = collect($arrtinh);

           $perPage = 1;

           $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

           $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

           $paginatedItems->setPath($request->url());
           
           return view('backend.huyenchitiet',['arrtinh' => $paginatedItems],compact('tinh','ten_tinh'));
        }
    }

    public function getHuyenById(Request $request){
        $data = huyen::where('id_tinh',$request->tinh)->get()->toArray();
        echo '<option value="">Chọn huyện</option>';
        foreach ($data as $v) {
         echo ' <option value="'.$v['id'].'">'.$v['ten'].'</option>';
        }
    }
    
    public function addHuyenChiTiet(){
        $data = tinh::all();
        return view('backend.addHuyenchitiet',compact('data'));
    }
    public function PostaddHuyenChiTiet(request $request){
        $request->validate([
            'id_huyen'=>'required',
        ],[
            'id_huyen.required'=>'Nhập đúng tên huyện',
        ]);

        $value=$request->id_huyen;
        $arr=explode('-',$value);
        $value=$arr[count($arr)-1];
        $value2=$arr[0];
        $data1=huyen::where('ten',$value)->orWhere('mabc',$value2)->firstOrFail();

        $data=$request->only('doi_tuong_gan','ten','mabc','data1','data2','data3','data4','data5');
        $data['id_huyen']=$data1->id;
        chitiet::create($data);
        return redirect('admin/huyenchitiet');
        
    }
    public function editHuyenChiTiet($id){
        $chitiet=chitiet::where('mabc',$id)->firstOrFail();
        return view('backend.editHuyenchitiet',compact('chitiet'));
    }
    public function postEditHuyenChiTiet($id,request $request){
        $request->validate([
            'id_huyen'=>'required',
        ],[
            'id_huyen.required'=>'Nhập đúng tên huyện',
        ]);

        $value=$request->id_huyen;
        $arr=explode('-',$value);
        $value=$arr[count($arr)-1];
        $value2=$arr[0];
        $data1=huyen::where('ten',$value)->orWhere('mabc',$value2)->firstOrFail();

        $chitiet=chitiet::where('mabc',$id)->firstOrFail();
        $data=$request->only('doi_tuong_gan','ten','mabc','data1','data2','data3','data4','data5');
        $data['id_huyen']=$data1->id;
        
        
        $chitiet->update($data);
        return redirect('admin/doi-tuong-gan-ma');
    }
    public function deleteHuyenChiTiet($id){
        chitiet::where('mabc',$id)->delete();
        return redirect('admin/huyenchitiet');
    }
    

    //Tỉnh chi tiết
    public function getTinhChiTiet(request $request){
        if(isset($request->search)){
            
            $value=$request->search;
            $arr=explode('-',$value);
            $value=$arr[count($arr)-1];
            $value2=$arr[0];
            // $chitiets= DB::select("select * from bc_chitiet ,bc_tinh_chitiet where bc_chitiet.ten LIKE ? OR bc_tinh_chitiet.ten LIKE ?", [$serach,$serach]);
            // dd($chitiets);
            // $chitiethuyen=chitiet::where('ten','LIKE',"%".$serach."%")->orWhere('mabc','LIKE',"%".$serach."%")->paginate(20);
            $chitiets=TinhChitiet::where('ten_eng','LIKE',"%".$value."%")->orWhere('mabc','LIKE',"%".$value2."%")->paginate(20);
        }else{
            //$chitiethuyen=
            $chitiets=TinhChitiet::with('tinh')->paginate(20);
            // dd($chitiets[0]->toArray());
        }
        return view('backend.tinhchitiet',compact('chitiets'));
    }
    public function editTinhChiTiet($id){
        $chitiet=TinhChitiet::where('mabc',$id)->firstOrFail();
        // dd($chitiet);
        return view('backend.editTinhchitiet',compact('chitiet'));
    }
    public function postEditTinhChiTiet($id,request $request){
        $request->validate([
            'id_tinh'=>'required',
        ],[
            'id_tinh.required'=>'Hãy nhập tên tỉnh',
        ]);
        
        $value=$request->id_tinh;
        $arr=explode('-',$value);
        $value=$arr[count($arr)-1];
        $value2=$arr[0];
        $data1=tinh::where('ten',$value)->orWhere('mabc',$value2)->firstOrFail();

        $chitiet=TinhChitiet::where('mabc',$id)->firstOrFail();
        $data=$request->only('dt_gan_ma','ten','ten_eng','mabc','data1','data2','data3','data4','data5');
        $data['id_tinh']=$data1->id;
        // dd($data);
        $chitiet->update($data);
        return redirect('admin/doi-tuong-gan-ma');
    }
    public function addTinhChiTiet(){
        return view('backend.addTinhchitiet');
    }
    public function PostaddTinhChiTiet(request $request){
        $tinh = $request->tinh;
         $huyen = $request->huyen;


         if($tinh!= null&&$huyen==null){
            $mabc = TinhChitiet::where('mabc',$request->mabc)->get();
            if(count($mabc)>0){
              return redirect()->back()->with('loi','Mã bưu chính đã tồn tại');
            }
            $data=$request->only('dt_gan_ma','ten','ten_eng','mabc','data1','data2','data3','data4','data5');
            $data['id_tinh']=$tinh;
            TinhChitiet::create($data);
          }elseif($tinh!= null&&$huyen!=null){
             $mabc = chitiet::where('mabc',$request->mabc)->get();
             if(count($mabc)>0){
              return redirect()->back()->with('loi','Mã bưu chính đã tồn tại');
             }
             $data=$request->only('doi_tuong_gan','ten','mabc','data1','data2','data3','data4','data5');
             $data['id_huyen']=$huyen;
             chitiet::create($data);
          }
        return redirect('admin/huyenchitiet');
    }
    public function deleteTinhChiTiet($id){
        TinhChitiet::where('mabc',$id)->delete();
        return redirect('admin/huyenchitiet');
    }
}
