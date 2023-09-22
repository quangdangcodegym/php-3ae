<?php

/**
 -- Khai báo biến thì không cần khai kiểu dữ liệu
 -- Kiểu dữ liệu khi được gán giá trị
$a = 5;
$b = "abc";

print_r($a);        // xem giá trị       
var_dump($a);       // xem kiểu dữ liệu và giá trị
var_dump($b);

$c; //underfine - js <=>
var_dump($c);


$txt = "W3Schools.com" . "aaa";         // cộng chuỗi dùng: .
echo $txt;

//----------------------
-- Bên trong hàm muốn sử dụng biến toàn cục thì khai báo global
-- Biến global được lưu lưu trong mảng $GLOBALS với key là 'tến biến'
$x = 5; 

function myTest() {
    $x = 3;
    $y = 10;
    echo "<p>Variable x inside function is: $x</p>";
    $x = 50;

    echo "Truy cap tu bien GLOBAL " . $GLOBALS['x'];
}
myTest();
echo "<p>Variable x outside function is: $x</p>";
 */


 function myTest() {
    static $x = 0;
    echo $x;
    $x++;
}
myTest();
myTest();
myTest();


?>