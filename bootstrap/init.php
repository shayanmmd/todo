<?php

include("constants.php");
include("libs/helpers.php");
include("config.php");

$host = HOST;
$database = DATABASE;
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database",USERNAME,PASSWORD);    
} catch (PDOException $pdoException) {
    errorPage();
}
