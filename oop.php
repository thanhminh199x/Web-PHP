<?php
function getPersonnel()
{
$name = 'Vu Van A';
$age = 32;
echo $name."<br>". $age;
}
getPersonnel();
echo"<Br>";
function tinhTong($a,$b)
{
    echo $a+$b;
}
$a=2;
$b=4;
tinhTong($a,$b);

function Name($name = 'world')
{
    echo '<br>hello' . $name;

}
Name();
echo"<br>";

//khởi tạo hàm readName và thiết lập tham số mặc định
function readName($name = 'world')
{
    echo '<br>Hello ' . $name;
}

//gọi hàm không truyền tham số
readName(); // kết quả: hello world
//gọi hàm có truyền tham số
readName('Minh'); //kết quả: hello Minh
//khởi tạo biến a
$a = 'Chu Thanh Minh';
//gọi hàm
readName($a);//kết quả: hello toidicode


?>

<?php
echo"<br>";
//khởi tạo hàm checkNumber có tham số truyền vào và đồng thời xét tham số mặc định cho nó = 0
function checkNumber($number = 0)
{
    // nếu số truyền vào lớn hơn 10
    if ($number > 10) {
        echo '<br>lớn hơn';
    } // nếu số truyền vào nhỏ hơn 10
    else {
        echo '<Br>nhỏ hơn hoặc bằng';
    }
}

// gọi hàm
//gọi hàm không truyền tham số
checkNumber(); //kết quả nhỏ hơn hoặc bằng
//gọi hàm có truyền tham số
checkNumber(11);// kết quả lớn hơn
    ?>
