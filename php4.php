<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php

for ($i = 0; $i < 10; $i++){
echo $i . '<br> ';
}
?>
<pre> lặp nhau </pre>
<?php
for ($i = 1; $i < 10; $i++)
{
    for ($j =1 ; $j <= $i; $j++)
    {
        echo $j;
    }
    echo '<br/>';;
}
echo"<br>";
for ($i = 1; $i < 10; $i++)
{
    for ($j =9 ; $j >= $i; $j--)
    {
        echo $j;
    }
    echo '<br/>';;
}
$i = 1; // Biến dùng để lặp
while ($i <= 10){ // Nếu $i <= 10 thì mới lặp
    echo $i . ' <br> '; // Xuất ra màn hình
    $i++; // Tăng biến $i lên 1
}
echo"<br>";
$i = 1;
while ($i < 10)
{
    $j = $i;
    while ($j < 10)
    {
        echo $j;
        $j++;
    }
    echo "<br>";
    $i++;
}

?>
</body>
</html>