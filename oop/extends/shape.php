<?php

interface Resizable{
    function resize($percent);
}
abstract class Shape{
    private $color;
    protected $filled;
    public function __construct($color, $filled){
        $this->color = $color;
        $this->filled = $filled;
    }

    function getColor(){
        return $this->color;
    }

    public function showInfo(){
        return "Default";
    }
    public function __toString()
    {
        return "to string default";
    }
    public abstract function getArea();

}

class Rectangle extends Shape implements Resizable{
    private $width;
    private $height;

    public function __construct($color, $filled, $width, $height)
    {
        parent::__construct($color, $filled);
        $this->width = $width;
        $this->height = $height;
    }

    public function showInfo(){
        return "color: " . $this->getColor() . " filled: " . $this->filled;
    }
    public function __toString()
    {
        return "color: " . $this->getColor() . " filled: " . $this->filled;
    }
    public function getArea(){
        return $this->width * $this->height;
    }
    public function resize($percent){
        $this->width = $this->width + $this->width*$percent/100;
        $this->height = $this->height + $this->height*$percent/100;
    }
}

$s1 = new Rectangle("RED", false, 5, 5);
$s2 = new Rectangle("RED", false, 5, 7);
$s3 = new Rectangle("RED", false, 1, 1);

$arr = array($s1, $s2, $s3);



function cmp_function($a, $b)
   {
      if ($a->getArea() == $b->getArea()) return 0;
      return ($a->getArea() > $b->getArea()) ? -1 : 1;
   }

   
   usort($arr, "cmp_function");

   print_r($arr);

// echo $s1;


?>