<?php
require_once '../assets/classes/Usuario.php';
if(isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])){
   $id_usuario = addslashes($_SESSION['id_usuario']);
   $usuario = new Usuario();
   $usuarioDados = $usuario->getUsuario($id_usuario);
} else {
   header('Location: login');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
   <title>Adm - Byte Brasil</title>
</head>
<body>
   <div class="navbar navbar-expand-lg navbar-light bg-primary container-fluid">
      <div class="container">
         <a class="navbar-brand">Byte Brasil</a>
         <div>
            <?php
               if($usuarioDados['tipo'] == 1){
            ?>
               <a href="adicionar_usuario" class="btn btn-warning">Adicionar Usuário</a>
            <?php
               }
            ?>
            <a href="logout.php" class="btn btn-danger">Sair</a>
         </div>
      </div>
   </div>

   <div class="container mt-3">
      <h3>Bem vindo(a), usuário!</h3>
         <div class="btn-group mt-5" role="group" aria-label="Button group" id="button-group">
            <a href="javascript:;" class="btn btn-info btn-lg active" data-link="cursos.php">Cursos</a>
            <a href="javascript:;" class="btn btn-info btn-lg" data-link="vagas.php">Vagas</a>
            <a href="javascript:;" class="btn btn-info btn-lg" data-link="usuarios.php">Usuários</a>
            <a href="javascript:;" class="btn btn-info btn-lg" data-link="candidatos.php">Candidatos</a>
         </div>
   </div>
   <div class="container mt-3">
      <iframe src="cursos.php" frameborder="0" id="view-area" width="100%" height="1500px" scrolling="no"></iframe>
   </div>
   
   <script src="../assets/js/jquery-3.4.1.min.js"></script>
	<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/script.js"></script>
</body>
</html>