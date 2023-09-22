<?php
require "./NumberException.php";

function ham3()
{
    if (1 > 0) {
        throw new NumberException("LOI CHI DO");
    }
}
function ham2()
{
    ham3();
}
function ham1()
{
    try {
        ham2();
    } catch (NumberException $e) {
        echo $e->errorMessage();
    }
}
ham1();
