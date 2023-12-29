<?php

include("constants.php");
include("libs/helpers.php");

session_start();

$host = HOST;
$database = DATABASE;
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database",USERNAME,PASSWORD);    
} catch (PDOException $pdoException) {
    errorPage();
}

include("libs/folders.php");
include("libs/tasks.php");
include("libs/auth.php");