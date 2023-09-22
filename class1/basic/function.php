<?php

/**
function addNumbers(string $a, string $b): float {
    $x = floatval($a);
    $y = floatval($b);

    return  $x + $y;
}
echo addNumbers("xxx", "3.7");


function add_five(&$value) {     // tham số
    $value += 5;        // 7
}

$num = 2;       // đối số truyền vào
add_five($num);


echo "Gia tri cua num: " . $num;
 */

$arr = array(2,3);

function swap(&$arr){
    $temp = $arr[0];
    $arr[0] = $arr[1];
    $arr[1] = $temp;
}
swap($arr);
var_dump($arr); // đổi / không, không
