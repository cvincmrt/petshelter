<?php

namespace App;

class AnimalController
{
    private AnimalRepository $repo;

    public function __construct(AnimalRepository $repo){
        $this->repo = $repo;
     }

     //hlavna metoda, ktoru zavolam v index.php
     public function handleRequest(){

        if($_SERVER["REQUEST_METHOD"] !== "POST"){
            return;
        }

        $action = $_POST["action"] ?? "";

        switch($action){
            case "create":
                $this->store();
                break;
            case "adopt":
                $this->update();
                break;
            case "delete":
                $this->destroy();
                break;
        }
     }

     private function redirect(){
        header("Location:index.php");
        exit();
     }

     private function update(){
        $id = (int)$_POST["animal_id"];

        $this->repo->updateStatus($id);
        $this->redirect();
     }

     public function destroy(){
        $id = (int)$_POST["animal_id"];

        $this->repo->deletePet($id);  
        $this->redirect();  
     }

        public function store(){
            $name = $_POST["fName"];
            $type = $_POST["fType"];
            $age = (int)($_POST["fAge"]);
            $gender = $_POST["fGender"];
            $status = $_POST["fStatus"] === "adopt" ? 0 : 1;
            $specParam = $_POST["fSpecParam"] === "outdoor" ? 1 : $_POST["fSpecParam"];
    
            $pet = null;
    
            if($type === "Dog"){
                $pet = new Dog($name, (int)$age, $gender, (int)$status, $specParam);
            }elseif($type === "Cat"){
                $pet = new Cat($name, (int)$age, $gender, (int)$status, $specParam);
            }
    
            if($pet){
                $this->repo->createPet($pet);
                $this->redirect();
            }
        }
}  