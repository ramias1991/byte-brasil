<?php
class Cursos extends Conexao{

    public function getAllCursos($ativo = array(), $offset = '', $pagCurso = ''){
        $array = array();

        $status = '';
        if(count($ativo) > 0){
            $status = "WHERE `status` = " . $ativo[0];
        }

        $limit = " LIMIT " . $offset . ", " . $pagCurso;
        if($offset == '' && $pagCurso == ''){
            $limit = '';
        }

        $sql = "SELECT * FROM cursos " . $status . $limit;
        $sql = $this->Conectar()->query($sql);
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        } else {
            echo "<script>";
            echo "alert('Nenhum curso listado!');";
            echo "window.location.href = 'cursos'";
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
            echo "window.location.href = 'cursos';";
            echo "</script>";
        }

        return $array;
    }

    public function countCursos($ativo = array()){
        $status = '';
        if(count($ativo) > 0){
            $status = " WHERE `status` = $ativo[0]";
        }
        
        $sql = "SELECT count(*) as qtdCurso FROM cursos" . $status;
        $sql = $this->Conectar()->query($sql);
        if($sql->rowCount() > 0){
            $qtdCurso = $sql->fetch();
        }

        return $qtdCurso['qtdCurso'];

    }

    public function setImagemCurso($imagem = array()){
        $img = $imagem;
        if(!empty($img['tmp_name'])){
            $nomeArquivo = md5(time() . rand(0, 99999)) . '.jpg';
            move_uploaded_file($img['tmp_name'], '../assets/img/' . $nomeArquivo);
            return $nomeArquivo;
        } else {
            return false;
        }
        
    }

    public function addCurso($titulo, $proposta_curso, $grade_curricular, $opcoes_aulas, $carga_horaria, $imagem = array()){
        $qtdCursoIni = $this->countCursos();

        $img = $this->setImagemCurso($imagem);
        $sql = "INSERT INTO cursos SET 
                titulo = :titulo, 
                proposta_curso = :proposta_curso, 
                grade_curricular = :grade_curricular, 
                opcoes_de_aulas = :opcoes_de_aulas, 
                carga_horaria = :carga_horaria, 
                imagem = :imagem";
        
        $sql = $this->Conectar()->prepare($sql);
        $sql->bindValue('titulo', $titulo);
        $sql->bindValue('proposta_curso', $proposta_curso);
        $sql->bindValue('grade_curricular', $grade_curricular);
        $sql->bindValue('opcoes_de_aulas', $opcoes_aulas);
        $sql->bindValue('carga_horaria', $carga_horaria);
        $sql->bindValue('imagem', $img);
        $sql->execute();

        $qtdCursoFin = $this->countCursos();

        if($qtdCursoIni < $qtdCursoFin){
            echo "<script>";
            echo "alert('Curso inserido com sucesso!');";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Opa!! Aconteceu algum problema!! Tente novamente!!');";
            echo "</script>";
        }
    }
}