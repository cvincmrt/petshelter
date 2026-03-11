<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Animal;

$dog = new Animal("Ferdo", 12, "male", "true");

$dog->setId(1);

var_dump($dog);