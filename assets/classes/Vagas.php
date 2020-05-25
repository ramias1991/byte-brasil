<?php

class Vagas extends Conexao {

    public function getAllVagas($ativo = array(), $offset, $pagVagas){
        $array = array();
        $params = array('1=1');
        if(count($ativo) > 0){
            $status = "WHERE `status` = " . $ativo[0];
        }

        $limit = " LIMIT " . $offset . ", " . $pagVagas;
        if($offset == '' && $pagVagas == ''){
            $limit = '';
        }
        
        $sql = "SELECT * FROM vagas " . $status . $limit;
        $sql = $this->Conectar()->query($sql);
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        } else {
            echo "<script>";
            echo "alert('Nenhuma vaga encontrada!!');";
            echo "window.location.href = 'home';";
            echo "</script>";
        }

        return $array;
    }

    public function countVagas($ativo = array()){
        $status = '';
        if(count($ativo) > 0){
            $status = "WHERE `status` = " . $ativo[0];
        }
        $sql = "SELECT count(*) as qtdVagas FROM vagas " . $status;
        $sql = $this->Conectar()->query($sql);

        if($sql->rowCount() > 0){
            $qtdVagas = $sql->fetch();
        }

        return $qtdVagas['qtdVagas'];
    }
}