<?php
class Cursos extends Conexao{

    public function getAllCursos(){
        $array = array();
        $sql = "SELECT * FROM cursos WHERE `status` = 1";
        $sql = $this->Conectar()->query($sql);
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
        $sql = $this->Conectar()->prepare($sql);
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