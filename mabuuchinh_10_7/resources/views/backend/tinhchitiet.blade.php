@extends('layout.backend.masterLayout')

@section('content')
<!--main-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row"  style="margin-top: 20px;">
        <ol class="breadcrumb" >
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active"> Đối tượng gắn mã tỉnh và đơn vị tương đương </li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center;"><b>DANH SÁCH TỈNH CHI TIẾT</b></div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                           
                                <a class="btn btn-success " href="{{route('admin.add_tinhchitiet')}}" role="button"><i class="fa fa-plus"></i> Thêm tỉnh chi tiết</a>
                            <table class="table table-bordered table-responsive table-hover table-condensed" style="margin-top:20px;">				
                                <thead>
                                    <tr class="bg-primary">
                                        <th style="text-align: center;">ID</th>
                                        <th style="text-align: center;" >Đối tượng gán mã</th>
                                        <th style="text-align: center;">Tên</th>
                                        <th style="text-align: center;">Mã bưu chính</th>
                                        <th style="text-align: center;">Điện thoại</th>
                                        <th style="text-align: center;">Ghi chú</th>
                                        <th style="text-align: center;">Địa chỉ</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">Website</th>
                                        <th style="text-align: center;">Tỉnh</th>
                                        <th style="text-align: center;">Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($chitiets as $chitiet)
                                        
                                    <tr>
                                        
                                        <td style="text-align: center;">{{$chitiet->id}}</td>
                                        <td style="text-align: center;">{{$chitiet->dt_gan_ma}}</td>
                                        <td style="text-align: center;">{{$chitiet->ten}}</td>
                                        <td style="text-align: center;">{{$chitiet->mabc}}</td>
                                        <td style="text-align: center;">{{$chitiet->data1}}</td>
                                        <td style="text-align: center;">{{$chitiet->data2}}</td>
                                        <td style="text-align: center;">{{$chitiet->data3}}</td>
                                        <td style="text-align: center;">{{$chitiet->data4}}</td>
                                        <td style="text-align: center;">{{$chitiet->data5}}</td>
                                        <td style="text-align: center;">{{$chitiet->tinh->ten}}</td>
                                        <td style="text-align: center;width: 150px;">
                                            <a href="{{ route('admin.edit_tinhchitiet', $chitiet->mabc)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Sửa</a>
                                            <a href="{{ route('admin.delete_tinhchitiet', $chitiet->mabc)}}" class="btn btn-danger" onclick="return confirmAction()"><i class="fa fa-pencil" aria-hidden="true"></i>Xóa</a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$chitiets->links()}}							
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