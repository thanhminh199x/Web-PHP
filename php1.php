<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<h1>Các Kiến Thức Bài 1</h1>
<pre>
    biến = $
    hằng = define("tên hằng số", "giá trị của hằng số");

</pre>
<?php
$a = 5;
$b = 7;
$tong = $a+$b;
$tong += $a ;
echo"<br>tong =".$tong;
$hieu = $tong *$a;
echo"<br>hieu =".$hieu;
$tong =$hieu -$a;
echo"<br>tong =".$tong;
echo"<br>";
echo 12345;
echo '<br>chào \'hà nội\'';
echo "<br>";
$ngaysinh = "300496";
$tensinhvien = " Chu Thanh Minh";
echo $tensinhvien;
echo "<br>";
echo $ngaysinh;
echo"<br>";
echo str_replace("ha noi", "da nang", "chao mung ban den tp ha noi");
?>
</body>
</html>