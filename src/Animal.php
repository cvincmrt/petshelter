<?php

namespace App;

class Animal
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

    public function getSound()
    {
        return "sound";    
    }
}