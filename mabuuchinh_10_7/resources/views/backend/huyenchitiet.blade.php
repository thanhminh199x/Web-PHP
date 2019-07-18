@extends('layout.backend.masterLayout')
@section('content')
<!--main-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb"  style="margin-top: 20px;">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active"> Đối tượng gắn mã </li>
        </ol>
    </div><!--/.row-->
    <div class="panel panel-primary">
        <div class="panel-heading" style="text-align: center;"><b><i class="fas fa-list-alt"></i> DANH SÁCH ĐỐI TƯỢNG GẮN MÃ</b></div>
        <div class="panel-body">
            <div class="bootstrap-table">
                <div class="table-responsive">

                    <a class="btn btn-success " href="{{route('admin.add_huyenchitiet')}}" role="button"><i class="fa fa-plus"></i> Thêm đối tượng gắn mã</a>

                    <form action="" method="get" class="form-search" style="margin: 10px 0;">
                        <input type="hidden" name="page" value="1">
                        <select  name="id_tinh" class="form-control" style="width: 25%;float: left;">
                            <option value="">Chọn tỉnh</option>
                            @foreach($tinh as $v)
                              <option value="{{$v->id}}">{{$v->ten}}</option>
                            @endforeach
                        </select>&nbsp;
                        <span><button class="btn btn-danger" type="submit" id="search"><i class="fas fa-filter"></i> Lọc</button></span>   
                    </form>

                    @if(isset($arrtinh))
                    <div style="padding: 10px;border:1px solid #ddd;width: 150px;border-top-right-radius: 10px;border-top-left-radius: 10px;margin-top: 20px;background-color: #e9ecf2;"><b>{{$ten_tinh}}</b></div>
                    <table class="table table-bordered table-responsive table-hover table-condensed" >              
                        <thead>
                            <tr class="bg-primary">
                                <th style="text-align: center;">STT</th>
                                <th style="text-align: center;">Tên</th>
                                <th style="text-align: center;">Mã bưu chính</th>
                                <th style="text-align: center;">Điện thoại</th>
                                <th style="text-align: center;">Địa chỉ</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Website</th>
                                <th style="text-align: center;">Ghi chú</th>
                                <th style="text-align: center;width: 150px;">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $stt = 0; ?>
                           @foreach($arrtinh as $tinh)
                               @foreach($tinh as $huyen)
                               <tr>
                                <td style="text-align: center;"><?php $stt+=1; echo $stt; ?></td>
                                <td style="text-align: center;">{{$huyen['ten']}}</td>
                                <td style="text-align: center;">{{$huyen['mabc']}}</td>
                                <td style="text-align: center;">{{$huyen['data1']}}</td>
                                <td style="text-align: center;">{{$huyen['data2']}}</td>
                                <td style="text-align: center;">{{$huyen['data3']}}</td>
                                <td style="text-align: center;">{{$huyen['data4']}}</td>
                                <td style="text-align: center;">{{$huyen['data5']}}</td>
                                <td style="text-align: center;width: 200px;">
                                     @if(isset($huyen['id_huyen']))
                                     <a href="{{ route('admin.edit_huyenchitiet', $huyen['mabc'])}}" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Sửa</a>
                                     <a href="{{ route('admin.delete_huyenchitiet', $huyen['mabc'] )}}" class="btn btn-danger" onclick="return confirmAction()"><i class="fas fa-trash-alt"></i> Xóa</a>
                                     @elseif(isset($huyen['id_tinh']))
                                     <a href="{{ route('admin.edit_tinhchitiet', $huyen['mabc'])}}" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Sửa</a>
                                     <a href="{{ route('admin.delete_tinhchitiet', $huyen['mabc'] )}}" class="btn btn-danger" onclick="return confirmAction()"><i class="fas fa-trash-alt"></i> Xóa</a>
                                     @endif
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                   </table>

                   {{$arrtinh->links()}}  
                   <?php 
                        if(isset($_GET['id_tinh'])){
                    ?> 

                       <input type="hidden" id="idtinh" value="<?php echo $_GET['id_tinh']; ?>">
                       <script>
                        $(document).ready(function(){
                            var idtinh = $('#idtinh').val();
                            $(".pagination .page-item .page-link").mouseover(function(){
                             var link = $(this).attr("href");
                             var newlink = link+"&id_tinh="+idtinh;
                             $(this).attr("href", newlink);
                         });
                        });
                    </script>
                    <?php 
                        }
                     ?>
                    @elseif(isset($chitiets)&&isset($chitiets2)) 
                     <div style="padding: 10px;border:1px solid #ddd;width: 150px;border-top-right-radius: 10px;border-top-left-radius: 10px;margin-top: 20px;background-color: #e9ecf2;"><b>Kết quả tìm kiếm </b></div>
                    <table class="table table-bordered table-responsive table-hover table-condensed" >              
                        <thead>
                            <tr class="bg-primary">
                                <th style="text-align: center;">STT</th>
                                <th style="text-align: center;">Tên</th>
                                <th style="text-align: center;">Mã bưu chính</th>
                                <th style="text-align: center;">Điện thoại</th>
                                <th style="text-align: center;">Ghi chú</th>
                                <th style="text-align: center;">Địa chỉ</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Website</th>
                                <th style="text-align: center;width: 150px;">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $stt = 0; ?>
                           @foreach($chitiets as $huyen)

                           <tr>
                            <td style="text-align: center;"><?php $stt+=1; echo $stt; ?></td>
                            <td style="text-align: center;">{{$huyen['ten']}}</td>
                            <td style="text-align: center;">{{$huyen['mabc']}}</td>
                            <td style="text-align: center;">{{$huyen['data1']}}</td>
                            <td style="text-align: center;">{{$huyen['data2']}}</td>
                            <td style="text-align: center;">{{$huyen['data3']}}</td>
                            <td style="text-align: center;">{{$huyen['data4']}}</td>
                            <td style="text-align: center;">{{$huyen['data5']}}</td>
                            <td style="text-align: center;width: 200px;">
                                @if(isset($huyen['id_huyen']))
                                <a href="{{ route('admin.edit_huyenchitiet', $huyen['mabc'])}}" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Sửa</a>
                                <a href="{{ route('admin.delete_huyenchitiet', $huyen['mabc'] )}}" class="btn btn-danger" onclick="return confirmAction()"><i class="fas fa-trash-alt"></i> Xóa</a>
                                @elseif(isset($huyen['id_tinh']))
                                <a href="{{ route('admin.edit_tinhchitiet', $huyen['mabc'])}}" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Sửa</a>
                                <a href="{{ route('admin.delete_tinhchitiet', $huyen['mabc'] )}}" class="btn btn-danger" onclick="return confirmAction()"><i class="fas fa-trash-alt"></i> Xóa</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @foreach($chitiets2 as $huyen)

                           <tr>
                            <td style="text-align: center;"><?php $stt+=1; echo $stt; ?></td>
                            <td style="text-align: center;">{{$huyen['ten']}}</td>
                            <td style="text-align: center;">{{$huyen['mabc']}}</td>
                            <td style="text-align: center;">{{$huyen['data1']}}</td>
                            <td style="text-align: center;">{{$huyen['data2']}}</td>
                            <td style="text-align: center;">{{$huyen['data3']}}</td>
                            <td style="text-align: center;">{{$huyen['data4']}}</td>
                            <td style="text-align: center;">{{$huyen['data5']}}</td>
                            <td style="text-align: center;width: 200px;">
                                @if(isset($huyen['id_huyen']))
                                <a href="{{ route('admin.edit_huyenchitiet', $huyen['mabc'])}}" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Sửa</a>
                                <a href="{{ route('admin.delete_huyenchitiet', $huyen['mabc'] )}}" class="btn btn-danger" onclick="return confirmAction()"><i class="fas fa-trash-alt"></i> Xóa</a>
                                @elseif(isset($huyen['id_tinh']))
                                <a href="{{ route('admin.edit_tinhchitiet', $huyen['mabc'])}}" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Sửa</a>
                                <a href="{{ route('admin.delete_tinhchitiet', $huyen['mabc'] )}}" class="btn btn-danger" onclick="return confirmAction()"><i class="fas fa-trash-alt"></i> Xóa</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   </table>
                   @endif                       
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>
        
</div>	
<!--end main-->
<script>
    function confirmAction() {
      return confirm("Bạn có chắc chắn muốn xóa");
  }

</script>
@endsection