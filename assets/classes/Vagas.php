<?php
require_once 'Conexao.php';

class Vagas extends Conexao {

    public function getAllVagas(){
        $array = array();
        $sql = "SELECT * FROM vagas";
        $sql = $this->Conectar()->query($sql);
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