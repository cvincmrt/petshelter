<?php

namespace App;

abstract class Animal
{
    protected int $id;
    protected string $name;
    protected int $age;
    protected string $gender;
    protected bool $is_adopted;

    public function __construct(string $name, int $age, string $gender, bool $is_adopted)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->is_adopted = $is_adopted;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    abstract public function getSound();

    public function getName(){
        return $this->name;
    }
    public function getAge(){
        return $this->age;
    }
    public function getGender(){
        return $this->gender;
    }

    public function getIsAdopted(){
        return $this->is_adopted;
    }
    
}