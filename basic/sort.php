<?php
/**
 $cars = ["Volvo", "BMW", "Toyota"];

 $age = ["Peter" => "35", "Ben" => "37", "Joe" => "43"];

 asort($age);
 var_dump($age);

 $numbers = array(4,6,8,1);

echo max($numbers) . "<br/>";
echo max(4,2,18,7);
  */

function mymax($value, ...$values){
    /**
    $arr = [];
    if(is_array($value)){
        $arr = $value;
    }else{
        $arr [] = $value;
        
        foreach($values as $v){
            $arr [] = $v;
        }
        array_push($arr, ...$values);
    }
    */
    if(!is_array($value)){
        array_push($values, $value);
    }else{
        array_push($values, ...$value);
    }
    
    var_dump($values);
}

$numbers = array(4,6,8);
echo "TRUYEN MANG: " . mymax($numbers);
echo "TRUYEN NHIEU DOI SO: " . mymax(4,6,8,7);






?>