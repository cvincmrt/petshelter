<?php

namespace App;

class Dog extends Animal
{
    private string $breed;

    public function __construct(string $name, int $age, string $gender, int $is_adopted, string $breed){
        parent::__construct($name, $age, $gender, $is_adopted);
        $this->breed = $breed;
    }

    public function getSound(){
        return "baf baf baf";
    }
}