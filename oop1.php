<?php
class Hinh
{
    protected function tinhDienTich()
    {
        //code
    }
}

class HinhVuong extends Hinh
{
    private $canh;

    public function setCanh($canh)
    {
        $this->canh = $canh;
    }

    public function getCanh()
    {
        return $this->canh;
    }

    //xử lý tính diện tích của hình vuông
    public function tinhDienTich()
    {
        return pow($this->canh, 2);
    }
}

class HinhTron extends Hinh
{
    private $bankinh;

    public function setBanKinh($bankinh)
    {
        $this->bankinh = $bankinh;
    }

    public function getBanKinh()
    {
        return $this->bankinh;
    }

    //xử lý tính diện tích của hình tròn
    public function tinhDienTich()
    {
        return (pow($this->bankinh,2) * pi());
    }
}

$hinhvuong = new HinhVuong();

$hinhvuong->setCanh(4);

echo $hinhvuong->tinhDienTich();
echo '
 ___________________________________________________ 
';
$hinhtron = new HinhTron();

$hinhtron->setBanKinh(4);

echo $hinhtron->tinhDienTich();
?>
