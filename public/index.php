<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\AnimalController;
use App\AnimalRepository;
use App\Database;
use App\Animal;
use App\Dog;
use App\Cat;


//Vytvorim PDO connection pomocou Database triedy, ktoru pouzijem na vytvorenie repository, ktora sa stara o komunikaciu s databazou a poskytuje metody pre CRUD operacie               
$pdo = new Database();

//Ziskam PDO connection z Database triedy, ktoru pouzijem na vytvorenie repository, ktora sa stara o komunikaciu s databazou a poskytuje metody pre CRUD operacie   
$connect = $pdo->getConnection();

//Vytvorim repository, ktora sa stara o komunikaciu s databazou a poskytuje metody pre CRUD operacie
$repo = new AnimalRepository($connect);

//Vytvorim controller a zavolam hlavnu metodu handleRequest, ktora sa postara o spracovanie POST requestov z formularov v dashboard.php 
$controller = new AnimalController($repo);

//Zavolam hlavnu metodu handleRequest, ktora sa postara o spracovanie POST requestov z formularov v dashboard.php
$controller->handleRequest();

//Ziskam vsetky zvierata z databazy pomocou repository, ktoru pouzijem na zobrazenie v dashboard.php
$animals = $repo->getAll();

//Zobrazim dashboard, ktory zobrazuje vsetky zvierata a obsahuje formular pre pridanie noveho zvierata a tlacidla pre adopciu a odstranenie zvierat 
include __DIR__ . '/../views/dashboard.php';

