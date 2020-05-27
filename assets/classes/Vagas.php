<?php

class Vagas extends Conexao {

    public function addVaga($dadosVaga){
        $countVagasIni = $this->countVagas();
        $sql = "INSERT INTO vagas SET
                titulo = :titulo,
                funcao = :funcao,
                horario_trabalho = :horario_trabalho,
                idade = :idade,
                sexo = :sexo,
                requisitos_profissionais = :requisitos_profissionais,
                `local` = :local,
                salario = :salario";
        $sql = $this->Conectar()->prepare($sql);

        foreach($dadosVaga as $key => $value){
            $sql->bindValue(":$key", $value);
        }
        $sql->execute();

        $countVagasFin = $this->countVagas();

        if($countVagasFin > $countVagasIni){
            echo "<script>";
            echo "alert('Vaga adicionada com sucesso!');";
            echo "window.location.href = 'vagas'";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Opa!! Aconteceu algum problema!! Tente novamente!!');";
            echo "window.location.href = 'vagas'";
            echo "</script>";
        }
    }
    
    public function getAllVagas($ativo = array(), $offset = '', $pagVagas = ''){
        $array = array();

        $status = '';
        if(count($ativo) > 0){
            $status = "WHERE `status` = " . $ativo[0];
        }

        $limit = '';
        if(!empty($offset) && !empty($pagVagas)){
            $limit = " LIMIT " . $offset . ", " . $pagVagas;
        }
        
        $sql = "SELECT * FROM vagas " . $status . $limit . " ORDER BY hora_cadastro DESC";
        $sql = $this->Conectar()->query($sql);
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getVaga($id){
        $array = array();

        $sql = "SELECT * FROM vagas WHERE id = :id";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        } else {
            return false;
        }

        return $array;
    }

    public function editarVaga($dadosVaga){
        $sql = "UPDATE vagas SET
                titulo = :titulo,
                funcao = :funcao,
                horario_trabalho = :horario_trabalho,
                idade = :idade,
                sexo = :sexo,
                requisitos_profissionais = :requisitos_profissionais,
                `local` = :local,
                salario = :salario WHERE id = :id_vaga";
        $sql = $this->Conectar()->prepare($sql);

        foreach($dadosVaga as $key => $value){
            $sql->bindValue(":$key", $value);
        }

        $sql->execute();

        echo "<script>";
        echo "alert('Vaga editada com sucesso!');";
        echo "window.location.href = 'vagas'";
        echo "</script>";
    }

    public function ativarDesativarVaga($id){
        $vaga = $this->getVaga($id);
        if($vaga['status'] == 0){
            $sql = "UPDATE vagas SET `status` = 1 WHERE id = $id";
            $msg = 'Vaga ativada com sucesso!';
        } else if($vaga['status'] == 1){
            $sql = "UPDATE vagas SET `status` = 0 WHERE id = $id";
            $msg = 'Vaga desativada com sucesso!';
        }

        $sql = $this->Conectar()->query($sql);

        echo "<script>";
        echo "alert('".$msg."');";
        echo "window.location.href = 'vagas'";
        echo "</script>";
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