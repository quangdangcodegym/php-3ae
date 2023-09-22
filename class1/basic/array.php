<?php

$arr = array("Quang", "Hà", "Nghĩa");
for($i = 0; $i< count($arr); $i++){
    echo "Hello " .  $arr[$i] . "<br>";
}

$arr1 = array("1" => "Quang", "2" => "Hà","3" => "Nghĩa", "1"=>"Nhàn");
echo "Cách duyệt 1 <br>";
foreach ($arr1 as $key => $val){
    echo "Hello " . $val . "<br>";
}
echo "Cách duyệt 2 <br>";
foreach ($arr1 as $x){
    // var_dump($x);
    echo "Hello " . $x . "<br>";
}

?>