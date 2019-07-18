@extends('layout.backend.masterLayout')
@section('content')
<script src="/plugins/ckeditor/ckeditor.js"></script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Tỉnh</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <form class="col-sm-8 form-horizontal col-sm-offset-2" method="POST" action="">
                    @csrf
                    <h3><b>Thêm thông tin tỉnh</b></h3>
                    
                    <div class="form-group">
                      <label for="mst" class="col-sm-2 control-label">Vùng</label>
                      <div class="col-sm-8">
                        <input name="vung" type="text" class="form-control" id="mst" placeholder="Vùng">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="CMT" class="col-sm-2 control-label">Tên</label>
                      <div class="col-sm-8">
                        <input name="ten" type="text" class="form-control" id="address" placeholder="Tên">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">mabc</label>
                         <div class="col-sm-8">
                            <input name="mabc" type="text" class="form-control" id="name" placeholder="mabc">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber" class="col-sm-2 control-label">data1</label>
                        <div class="col-sm-8">
                            <input name="data1" type="text" class="form-control" id="phoneNumber" placeholder="data1" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">data2</label>
                        <div class="col-sm-8">
                            <input name="data2" type="text" class="form-control" id="email" placeholder="data2" >
                        </div>
                    </div>
                            <div class="form-group">
                                <label for="addressTd" class="col-sm-2 control-label">data3</label>
                                <div class="col-sm-8">
                                    <input name="data3" type="text" class="form-control" id="addressTd" placeholder="data3" >
                                </div>
                            </div>
                             
            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">data4</label>
                                <div class="col-sm-8">
                                    <input name="data4" type="text" class="form-control" placeholder="data4" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">data5</label>
                                <div class="col-sm-8">
                                    <input name="data5" type="text" class="form-control" placeholder="data5" >
                                </div>
                            </div>
                            
                           
                           
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Submit</button>
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
        ! function ($) {
            $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
            if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
            if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        });

        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function () {
            $('#avatar').click(function () {
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

        window.onload = function () {
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
@endsection