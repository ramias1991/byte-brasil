<?php
try{
    $pdo = new PDO("mysql:dbname=byte_brasil;hostname=localhost", "root", "");
} catch(PDOExeption $e){
    echo $e->getMessage();
}