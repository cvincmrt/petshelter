<?php

namespace App;

use PDO;
use PDOException;

class Database
{
    private string $hostName = "localhost";
    private string $db_name = "animal";
    private string $charset = "utf8mb4";

    private string $db_user = "root";
    private string $db_password = "";
    public ?PDO $conn = null;


    public function getConnection(){
        
        try{
            $dns = "mysql:host={$this->hostName};dbname={$this->db_name};charset={$this->charset}";
            $this->conn = new PDO($dns,$this->db_user,$this->db_password);
        }catch(PDOException $e){
            die("Spojenie s databazou sa nepodarilo".$e->getMessage());
        }
        return $this->conn;
    }
}