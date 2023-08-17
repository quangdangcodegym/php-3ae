<?php
/**
class Person {
    public string $name;

    public function setName($newName)
    {
        if(!str_contains($newName, "xxx")){
            $this->name = $newName;
        }else{
            throw new Exception("Invalid name");
        }
        
    }

    function getName()
    {
        return $this->name;
    }

}

$p = new Person();
echo $p->setName("abc");
echo $p->name;

echo $p->getName();

 */
?>