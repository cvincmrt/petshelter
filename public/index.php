<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\AnimalRepository;
use App\Database;
use App\Animal;
use App\Dog;
use App\Cat;

$pdo = new Database();

$connect = $pdo->getConnection();
$repo = new AnimalRepository($connect);

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["adopt"]) && $_POST["adopt"] === "adopt"){
    $id = (int)$_POST["animal_id"];
    $repo->updateStatus($id);
}

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["addPet"]) && $_POST["addPet"] === "addPet"){
    $name = $_POST["fName"];
    $type = $_POST["fType"];
    $age = (int)($_POST["fAge"]);
    $gender = $_POST["fGender"];
    $status = $_POST["fStatus"] !== "adopt" ? 0 : 1;
    $specParam = $_POST["fSpecParam"] === "outdoor" ? 1 : $_POST["fSpecParam"];

 var_dump($name, $type, $age, $gender, $status, $specParam);

    if($name && $type && $age && $gender && $specParam && $status){
       
        $pet = null;

        if($type === "Dog"){
            $pet = new Dog($name, $age, $gender, $status, $specParam);
        }elseif($type === "Cat"){
            $pet = new Cat($name, $age, $gender, $status, $specParam);
        }

        if($pet){
            $repo->createPet($pet);
     
        }
    }else{
        echo "All fields are required!";
    }

}




$animals = $repo->getAll();

include __DIR__ . '/../views/dashboard.php';

