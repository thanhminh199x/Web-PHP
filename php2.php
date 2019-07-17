<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kiến Thức Bài 2</title>
</head>
<body>
<pre>
    Câu lệnh điều kiện trong PHP
    if ($bien){}
</pre>
<?php
$diem = 9;
if($diem<4){
    echo"<br>F";
}
elseif ($diem<5){
   echo"<br>D";
}
elseif ($diem<5.5){
   echo"<br>D+";
}
elseif ($diem<6.5){
   echo"<br>C";
}
elseif ($diem<7){
   echo"<br>C+";
}
elseif ($diem<8){
   echo"<br>B";
}
elseif ($diem<8.5){
   echo"<br>B+";
}
elseif ($diem<9){
   echo"<br>A";
}
elseif ($diem<10){
   echo"<br>A+";
}

?>
</body>
</html>
