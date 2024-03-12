<?php

$host = "localhost";
$username = "simrs";
$password = "";
$db = "simrs";
$driver = "pgsql";

try {
    $pdo = new PDO("$driver:host=$host;dbname=$db",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch (\Exception $e) {
    die($e->getMessage());
}




