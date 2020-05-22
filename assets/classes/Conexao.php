<?php
session_start();
abstract class Conexao{
    public function Conectar(){
        try{
            $pdo = new PDO("mysql:dbname=byte_brasil;hostname=localhost", "root", "");
            return $pdo;
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}