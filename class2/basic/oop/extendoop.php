<?php

use Person as GlobalPerson;

class Person
{
    protected string $name;

    public function __construct()
    {
    }
    protected function set_name(string $newName): void
    {
        if ($newName != "Jimmy Two Guns") {
            $this->name = strtoupper($newName);
        }
    }
    protected function sayHello()
    {
        echo "CAll hello";
    }
}

class Employee extends Person
{
    public function __construct()
    {
        parent::__construct();
        Person::sayHello();
    }
    protected function set_name(string $newName): void
    {
        if ($newName == "Stefan Sucks") {
            $this->name = $newName;
        }
    }
}

$e = new Employee();

var_dump($e);
