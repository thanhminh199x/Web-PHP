@extends('layout.backend.masterLayout')
@section('content')
<script src="/plugins/ckeditor/ckeditor.js"></script>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa Quận, Huyện và các đơn vị tương đương</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <form class="col-sm-8 form-horizontal col-sm-offset-2" method="POST" action="">
                @csrf
                <h3 style="text-align: center;"><b>Sửa thông tin</b></h3>

                <div class="form-group">
                    <label for="CMT" class="col-sm-2 control-label">Tên</label>
                    <div class="col-sm-8">
                        <input name="ten" type="text" class="form-control" id="ten"  placeholder="Tên" value="{{$huyen->ten}}" required>
                    </div>
                </div>
                 {{-- Tên không dấu  --}}
                 <input name="ten_eng" type="hidden" class="form-control" id="ten_eng" placeholder="Tên ko dau" required>
                 {{--  --}}
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Mã bưu chính</label>
                    <div class="col-sm-8">
                        <input name="mabc" type="number" class="form-control" id="name" placeholder="mã" value="{{$huyen->mabc}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-2 control-label">Điện thoại</label>
                    <div class="col-sm-8">
                        <input name="data1" type="text" class="form-control" id="phoneNumber" placeholder="Điện thoại" value="{{$huyen->data1}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="addressTd" class="col-sm-2 control-label">Địa chỉ</label>
                    <div class="col-sm-8">
                        <input name="data3" type="text" class="form-control" id="addressTd" placeholder="Địa chỉ" value="{{$huyen->data3}}">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <input name="data4" type="text" class="form-control" placeholder="Email" value="{{$huyen->data4}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Website</label>
                    <div class="col-sm-8">
                        <input name="data5" type="text" class="form-control" placeholder="Website" value="{{$huyen->data5}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Ghi chú</label>
                    <div class="col-sm-8">
                        <input name="data2" type="text" class="form-control" id="email" placeholder="Ghi chú" value="{{$huyen->data2}}">
                    </div>
                </div>

                <div class="form-group">
                        <input  name="id_tinh" type="hidden" class="form-control input_tinh" placeholder="Tỉnh" value="{{$huyen->tinh->ten}}" autocomplete="off">
                        {{-- @if ($errors->has('id_tinh'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('id_tinh') }}</strong>
                        </span>
                        @endif --}}
                        <div class="danh-sach-mbc" style="display: none">
                            <div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9" style="text-align: center;">
                                <button type="submit" class="btn btn-success" onclick="return convert();" >Sửa</button>
                            </div>
                        </div>
            </form>
        </div>
    </div>

    <!--/.row-->




</div>
<!--end main-->
@endsection
@section('custom-script')
<script>
    $('#calendar').datepicker({});
    ! function($) {
        $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function() {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function() {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    });

    function changeImg(input) {
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function(e) {
                //Thay đổi đường dẫn ảnh
                $('#avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#avatar').click(function() {
            $('#img').click();
        });
    });


    var lineChartData = {
        labels: [


        ],
        datasets: [

            {
                label: "My Second dataset",
                fillColor: "rgba(48, 164, 255, 0.2)",
                strokeColor: "rgba(48, 164, 255, 1)",
                pointColor: "rgba(48, 164, 255, 1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(48, 164, 255, 1)",
                data: []
            }
        ]

    }

    window.onload = function() {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true
        });
        var chart2 = document.getElementById("bar-chart").getContext("2d");
        window.myBar = new Chart(chart2).Bar(barChartData, {
            responsive: true
        });
        var chart3 = document.getElementById("doughnut-chart").getContext("2d");
        window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {
            responsive: true
        });
        var chart4 = document.getElementById("pie-chart").getContext("2d");
        window.myPie = new Chart(chart4).Pie(pieData, {
            responsive: true
        });

    };
</script>
<script>
    $(document).ready(function() {

        $('.input_tinh').keyup(function() { //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
            var query = $('input[name="id_tinh"]').val();; //lấy gía trị ng dùng gõ
            if (query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
            {
                console.log(query);
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                $.ajax({
                    url: "{{route('ajaxtinh')}}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                    method: "POST", // phương thức gửi dữ liệu.
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) { //dữ liệu nhận về
                        console.log(data);
                        $('.danh-sach-mbc').fadeIn();
                        $('.btn-success').fadeOut();
                        $('.danh-sach-mbc').html(data);
                    }
                });
            } else {
                $('.danh-sach-mbc').fadeOut();
                $('.btn-success').fadeIn();
            }
        });

        $(document).on('click', '.autocomplete', function() {
            $('.input_tinh').val($(this).text());
            $('.btn-success').fadeIn();
            $('.danh-sach-mbc').fadeOut();
        });

    });
</script>
@endsection