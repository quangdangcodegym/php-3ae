<?php
function checkNum($number): bool
{
    if($number>1) {
        throw new Exception("Value must be 1 or below");
    }
    return true;
}

try{
    checkNum(5);
}catch(Exception $e){
    echo "Error: " . $e->getMessage();
}



?>