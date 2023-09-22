<?php
namespace Models;
use JsonSerializable;

class Product implements JsonSerializable{
    private int $id;
    private string $name;
    private string $description;
    private float $price;
    public function __construct($id, $name, $description, $price){
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
    
    public function jsonSerialize() {
        return  [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ];
    }


    public function __toString()
    {
        return "Name: " . $this->getName() . " price: " . $this->getPrice() . "<br>";
    }
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getPrice(){
        return $this->price;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function setName($name){
        $this->name = $name;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    
}

?>