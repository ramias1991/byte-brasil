<?php
require_once 'Conexao.php';

class Usuario extends Conexao {
   
   public function login($email, $senha){
      $array = array();
      $sql = "SELECT * FROM usuarios WHERE email = :email";
      $sql = $this->Conectar()->prepare($sql);
      $sql->bindValue(':email', $email);
      $sql->execute();

      if($sql->rowCount() > 0){
         $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
         $sql = $this->Conectar()->prepare($sql);
         $sql->bindValue(':email', $email);
         $sql->bindValue(':senha', md5($senha));
         $sql->execute();

         if($sql->rowCount() > 0){
            $array = $sql->fetch();
            $_SESSION['id_usuario'] = $array['id'];
            header('Location: cursos');
         } else {
            echo "<script>alert('Senha incorreta!!');</script>";
         }
      } else {
         echo "<script>alert('E-mail não cadastrado!');</script>";
      }
   }

   public function getUsuario($id){
      $array = array();
      $sql = "SELECT * FROM usuarios WHERE id = :id";
      $sql = $this->Conectar()->prepare($sql);
      $sql->bindValue(':id', $id);
      $sql->execute();

      if($sql->rowCount() > 0){
         $array = $sql->fetch();
      }

      return $array;

   }

}