<?php

namespace App;

use PDO;

class AnimalRepository
{
    private PDO $db;

    public function __construct(PDO $db){
       $this->db = $db;
    }


    public function getAll(){
        $pets = [];

        $sql = "SELECT * FROM animals";
        $stmt = $this->db->query($sql);

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $pet = null;

            if($row["type"] === "Cat"){
                $pet = new Cat($row["name"], (int)$row["age"], $row["gender"], (int)$row["is_adopted"], (int)$row["spec_param"]);
            }elseif($row["type"] === "Dog"){
                $pet = new Dog($row["name"], (int)$row["age"], $row["gender"], (int)$row["is_adopted"], $row["spec_param"]);
            }

            if($pet){
                $pet->setId((int)$row["id"]);
                $pets[] = $pet;
            }
            
        }
        return $pets;
    }

    public function updateStatus($id){
        $sql = "UPDATE animals SET is_adopted = 1 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        
        if($stmt->execute([":id" => $id])){
            header("Location:index.php");
            exit();
        }

    }

    public function createPet($pet){
        $sql = "INSERT INTO animals (type, name, age, gender, is_adopted, spec_param) VALUES (:type, :name, :age, :gender, :is_adopted, :spec_param)";
        $stmt = $this->db->prepare($sql);

        var_dump($pet);
        
        if($stmt->execute([
            ":type" => $pet instanceof Dog ? "Dog" : "Cat",
            ":name" => $pet->getName(),
            ":age" => $pet->getAge(),
            ":gender" => $pet->getGender(),
            ":is_adopted" => $pet->getIsAdopted(),
            ":spec_param" => $pet instanceof Dog ? $pet->getBreed() : $pet->getIsOutdoor()
        ])){
            header("Location:index.php");
            exit();
        }
    }
}