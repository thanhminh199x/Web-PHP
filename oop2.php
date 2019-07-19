<?php
class bar
{
public  function __construct(){
echo"bar duoc khoi tao";}
public function __destruct (){
echo"bar duoc huy";}}
class foo extends bar
{
    public function __construct()
    {    parent::__construct();
        echo"Foo duoc khoi tao".'<pre>';

    }
    public  function  __destruct()
    {
        echo"Foo bi huy";
    }
}
$foo= new Foo();
?>
