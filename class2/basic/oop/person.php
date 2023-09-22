<?php

class Person
{
    public $name;
    public $height;
    public $socialInsurance = "AAAAAAA";
    private $pinNumber;

    function __construct($personsName)
    {
        $this->name = $personsName;
    }

    function setName($newName)
    {
        $this->name = $newName;
    }

    function getName()
    {
        return $this->name;
    }
}
$p = new Person("Quang");

$a = 5;
echo "{$p->name} aaaaaaa";
