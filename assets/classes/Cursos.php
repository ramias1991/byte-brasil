<?php

class Cursos{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function getAllCursos(){
        $array = array();
        $sql = "SELECT * FROM cursos";
        $sql = $this->pdo->query($sql);
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        } else {
            echo "<script>";
            echo "alert('Nenhum curso listado!');";
            echo 'document.querySelector(".card").style.display = "none"';
            echo "</script>";
        }

        return $array;
    }

    public function getCurso($id){
        $array = array();
        $sql = "SELECT * FROM cursos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        } else {
            echo "<script>";
            echo "alert('Opa!! Aconteceu algum problema!! Tente novamente!!');";
            echo "window.location.href = 'cursos.php';";
            echo "</script>";
        }

        return $array;
    }
}