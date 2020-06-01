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
                salario = :salario,
                `status` = :status,
                anunciantes_id = :anunciantes_id";
        $sql = $this->Conectar()->prepare($sql);

        foreach($dadosVaga as $key => $value){
            $sql->bindValue(":$key", $value);
        }
        $sql->execute();


        $countVagasFin = $this->countVagas();

        if($countVagasFin > $countVagasIni){
            return array(true, 'Ok');
        } else {
            return false;
        }
    }
    
    public function getAllVagas($ativo = array(), $offset, $pagVagas){
        $array = array();
        $status = '';
        if(count($ativo) > 0){
            if($ativo[0] == 't'){
                $status = "WHERE `status` <> 3";
            } else {
                $status = "WHERE `status` = " . $ativo[0];
            } 
        }

        $limit = '';
        if($offset >= 0 && $pagVagas>= 0){
            $limit = " LIMIT " . $offset . ", " . $pagVagas;
        }
        
        $sql = "SELECT * FROM vagas " . $status . " ORDER BY hora_cadastro DESC". $limit;
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

    /* # Ativar ou Desativar uma vaga
        STATUS DAS VAGAS
        1 = Ativada
        2 = Desativada
        3 = Pendente
    */
    public function ativarDesativarVaga($id){
        $vaga = $this->getVaga($id);
        if($vaga['status'] == 2 || $vaga['status'] == 3){
            $sql = "UPDATE vagas SET `status` = 1 WHERE id = $id";
            $msg = 'Vaga ativada com sucesso!';
        } else if($vaga['status'] == 1){
            $sql = "UPDATE vagas SET `status` = 2 WHERE id = $id";
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
            if($ativo[0] == 3){
                $status = "WHERE `status` = 3";
            } else if($ativo[0] == 2){
                $status = "WHERE `status` = 2";
            } else if($ativo[0] == 1){
                $status = "WHERE `status` = 1";
            }
        }
        $sql = "SELECT count(*) as qtdVagas FROM vagas " . $status;
        $sql = $this->Conectar()->query($sql);

        if($sql->rowCount() > 0){
            $qtdVagas = $sql->fetch();
        }

        return $qtdVagas['qtdVagas'];
    }

}