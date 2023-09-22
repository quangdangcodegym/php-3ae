<?php
class Foo {
    public static int $max_value = 100;
    public static function aStaticMethod() {
        echo "aStaticMethod";
    }
}


echo Foo::aStaticMethod();
echo Foo::$max_value;


$foo = new Foo();
echo $foo->max_value;
?>