<?php

class Vagas {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function getAllVagas(){
        $array = array();
        $sql = "SELECT * FROM vagas";
        $sql = $this->pdo->query($sql);
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        } else {
            echo "<script>";
            echo "alert('Nenhuma vaga encontrada!!');";
            echo "window.location.href = 'index.php';";
            echo "</script>";
        }

        return $array;
    }
}