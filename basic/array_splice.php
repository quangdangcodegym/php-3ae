<?php
/**
$input = array("red", "green", "blue", "yellow", "AA", "BB");
array_splice($input, 1, null, array("x", "y"));
var_dump($input);
function sum($a = 5, $b = 10){
    return $a + $b;
}
echo sum();
**/

function my_array_splice(array &$array,int $offset, ?int $length = null,  $replacements = []){

}

function sum(?int $a = null,int $b = 10){
    if(is_null($a)){
        $a = 0;
    }
    return $a + $b;
}
echo sum(7, 5);

?>