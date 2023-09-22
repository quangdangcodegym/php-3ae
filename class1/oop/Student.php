<?php
 namespace utils;

 class Student{
    public ?string $name = null;
    public $email = null;

    /**
    public function __construct() {
        $this->name = "Quang";
        $this->email = "quang@gmail.com";
    }

    
    function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }
     
    function __construct($name) {
        $this->name = $name;
    }
    */
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }

    public function copyStudent(Student $student) {
        $this->email = $student->email;
        $this->name = $student->name;
    }
    

 }

 function findMax(){
    return 100;
 }

/**
 $s = new Student();
 $s->setName("Quang");


 $s1 = new Student();
 $s1->copyStudent($s);

 var_dump($s1);

 **/





?>