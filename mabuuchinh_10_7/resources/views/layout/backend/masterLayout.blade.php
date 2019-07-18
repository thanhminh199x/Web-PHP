<!DOCTYPE html>
<html>
<head>
    <base href="{{url('/backend')}}/">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Quản trị mã bưu chính</title>
 <!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>
	<!-- header -->
@include('layout.backend._inc.header')
@include('layout.backend._inc.silebar')
@yield('content')

<!-- javascript -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
@yield('custom-script')
<script>
        $(document).ready(function(){
      
         $('.input_search').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
          var query = $('input[name="search"]').val();; //lấy gía trị ng dùng gõ
          if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
          {
              console.log(query);
           var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
           $.ajax({
            url:"{{route('ajaxSearch')}}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
            method:"POST", // phương thức gửi dữ liệu.
            data:{query:query, _token:_token},
            success:function(data){ //dữ liệu nhận về
                console.log(data);
                $('.danh-sach-search').fadeIn(); 
                 $('#btnSearch').fadeOut();
                $('.danh-sach-search').html(data);
           }
         });
         }else{
            $('.danh-sach-search').fadeOut();
            $('.btn-primary').fadeIn();
         }
       });
      
         $(document).on('click', '.autocomplete', function(){  
          $('.input_search').val($(this).text());
          $('.btn-primary').fadeIn();
          $('.danh-sach-search').fadeOut();  
        });  
      
       });
</script>

{{-- Convert ten khong dau --}}
<script>
    function convert(){
        var str = document.getElementById('ten').value;
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
        str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
        str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
        str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
        str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
        str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
        str = str.replace(/Đ/g, "D");

       document.getElementById('ten_eng').setAttribute("value",str);
    }
</script>


	<script>
		$(document).ready(function(){
  			var currentURL = window.location.href;
  			$('ul.nav.menu a').each(function(i, item){
  				var href = $(item).attr('href');

  				if (href === currentURL) {
  					{{-- $('ul.nav.menu li.active').eq(0).removeClass('active') --}}
  					$(item).parentsUntil('ul.nav.menu').addClass('active')
  				}
  			});

        $('.itemson').each(function() {
            var $this = $(this); 

          // we check comparison between current page and attribute redirection.
          if ($this.attr('href') === currentURL) {
             $('.menucon').show();
            $this.css({"background-color": "#30a5ff","color": "white"});
          }
        });
    });
		//})
	</script>

</body>

</html>