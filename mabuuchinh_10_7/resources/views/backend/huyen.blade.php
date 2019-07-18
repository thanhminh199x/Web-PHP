@extends('layout.backend.masterLayout')
@section('content')
<!--main-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row"  style="margin-top: 20px;">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active"> Quận, Huyện và đơn vị tương đương</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center;"><b><i class="fas fa-list-alt"></i> DANH SÁCH HUYỆN VÀ CÁC ĐƠN VỊ TƯƠNG ĐƯƠNG</b></div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                           
                                <a class="btn btn-success " href="{{route('admin.add_huyenchitiet')}}" role="button"><i class="fa fa-plus"></i> Thêm đối tượng gán mã</a>
                            <table class="table table-bordered table-responsive table-hover table-condensed" style="margin-top:20px;">				
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
                                        <th style="text-align: center;">Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody> <?php 
                                    if(isset($_GET['page'])){
                                      $stt = ($_GET['page']-1)*20;
                                    }else{
                                      $stt=0;
                                    }
                                  ?>
                                        @foreach($huyens as $tinh)
                                        
                                    <tr>
                                        
                                        <td style="text-align:center;"><?php $stt+=1; echo $stt; ?></td>
                                        <td style="text-align:center;">{{$tinh->ten}}</td>
                                        <td style="text-align:center;">{{$tinh->mabc}}</td>
                                        <td style="text-align:center;">{{$tinh->data1}}</td>
                                        <td style="text-align:center;">{{$tinh->data2}}</td>
                                        <td style="text-align:center;">{{$tinh->data3}}</td>
                                        <td style="text-align:center;">{{$tinh->data4}}</td>
                                        <td style="text-align:center;">{{$tinh->data5}}</td>
                                        <td style="text-align:center;"> 
                                            <a href="{{ route('admin.edit_huyen', $tinh->id )}}" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Sửa</a>
                                           
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$huyens->links()}}							
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
        
    
</div>	
<!--end main-->
<script>
            function confirmAction() {
              return confirm("Bạn có chắc chắn muốn xóa");
            }
       
        </script>
@endsection