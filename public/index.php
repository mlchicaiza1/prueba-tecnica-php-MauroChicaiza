<?php

require __DIR__ ."/../vendor/autoload.php";
$userController = require __DIR__ . '/../src/bootstrap.php';

$request = [
    'id' =>uniqid(),
    'name' => 'user test',
    'email' => 'user@test.com',
    'password' => 'password123'
];
//Guardar el usuario
$user= $userController->create($request);
print_r (json_encode($user));