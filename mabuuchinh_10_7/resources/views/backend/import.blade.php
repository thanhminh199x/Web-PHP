@extends('layout.backend.masterLayout')
@section('content')
<!--main-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row" style="margin-top: 20px;">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active"> Cập nhật excel</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center;"><b>CẬP NHẬT EXCEL</b></div>
                <div class="panel-body">
                    <button data-toggle="modal" data-target="#import_file" class="btn btn-primary" role="button"><i class="fa fa-file-import"></i> Cập nhật bằng excel</button>
                    <!------------------Modal box --------------------------------->
                    <div id="import_file" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h3 class="modal-title" style="color: green;text-align: center;"><b>NHẬP FILE EXEL</b></h3>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('admin.import_excel')}}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <label for="">Chọn file :</label>
                                        <input type="file" name="select_file" value="Chọn file" class="form-control" placeholder="Chọn file" required="required"><br>
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-upload" style="padding-right:5px"></i>OK</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    @if(count($errors)>0)
                    <div class="alert alert-danger" style="margin: 20px 0;text-align: center;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @foreach($errors->all() as $err)
                        {{$err}} <br>
                        @endforeach
                    </div>
                    @endif

                    @if(Session::has('thanhcong'))
                    <div class="alert alert-success">{{Session::get('thanhcong')}}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    </div>
                    @endif
                    <!---------------------------------------------------------->

                </div>
            </div>
        </div>
    </div>
    <!--/.row-->


</div>
<!--end main-->
<script>
    function confirmAction() {
        return confirm("Bạn có chắc chắn muốn xóa");
    }
</script>
@endsection