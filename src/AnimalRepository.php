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
            if($row["type"] === "Cat"){
                $pet = new Cat($row["name"], (int)$row["age"], $row["gender"], (int)$row["is_adopted"], (int)$row["spec_param"]);
            }elseif($row["type"] === "Dog"){
                $pet = new Dog($row["name"], (int)$row["age"], $row["gender"], (int)$row["is_adopted"], $row["spec_param"]);
            }
            $pets[] = $pet;
        }
        return $pets;
    }
}