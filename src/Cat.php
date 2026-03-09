<?php

namespace App;

class Cat extends Animal
{
    private int $is_outdoor;

    public function __construct(string $name, int $age, string $gender, int $is_adopted, int $is_outdoor)
    {
       parent::__construct($name, $age, $gender, $is_adopted);
       $this->is_outdoor = $is_outdoor;
    }

    public function getSound(){
        return "Mnau mnau mnau";
    }

    public function getIsOutdoor(){
        return $this->is_outdoor;
    }
}