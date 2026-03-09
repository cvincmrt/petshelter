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
$animals = $repo->getAll();

include __DIR__ . '/../views/dashboard.php';

