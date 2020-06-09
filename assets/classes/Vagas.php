<?php

class Vagas extends Conexao {

    // # Adicionar Vagas
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
    
    // # Lista as vagas filtrando se estão ativas, inativas ou pendentes
    public function getAllVagas($ativo = array(), $offset = '', $pagVagas = '', $id_anunciante = ''){
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
        if((!empty($offset) || $offset == 0) && !empty($pagVagas)){
            $limit = " LIMIT " . $offset . ", " . $pagVagas;
        }

        $anunciante = '';
        if(!empty($id_anunciante) && $id_anunciante > 0){
            $anunciante = " AND anunciantes_id = " . $id_anunciante;
        }
        
        $sql = "SELECT * FROM vagas " . $status . $anunciante . " ORDER BY hora_cadastro DESC". $limit;
        $sql = $this->Conectar()->query($sql);
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }

    // Lista uma única vaga buscando pelo ID
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

    // Edita a vaga
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
        echo "window.history.back()";
        echo "</script>";
    }

    // # Deletar Vaga
    public function excluirVaga($id_vaga){
        $sql = "DELETE FROM vagas WHERE id = :id";
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue(":id", $id_vaga);
        $sql->execute();
        
        return true;
    }

    // Faz a contagem da quantidade de vagas
    public function countVagas($ativo = array(), $id_anunciante = ''){
        $status = '';
        if(count($ativo) > 0){
            if($ativo[0] == 't'){
                $status = " AND `status` <> 3";
            } else {
                $status = " AND `status` = " . $ativo[0];
            }
        }

        $anunciante = '';
        if(!empty($id_anunciante) && $id_anunciante > 0){
            $anunciante = " AND anunciantes_id = " . $id_anunciante;
        }
        $sql = "SELECT count(*) as qtdVagas FROM vagas WHERE 1=1" . $status . $anunciante;
        $sql = $this->Conectar()->query($sql);

        if($sql->rowCount() > 0){
            $qtdVagas = $sql->fetch();
        }

        return $qtdVagas['qtdVagas'];
    }

}