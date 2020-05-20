<?php
require_once '../assets/classes/Usuario.php';
if(isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])){
   $id_usuario = addslashes($_SESSION['id_usuario']);
} else {
   header('Location: login.php');
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
         <a href="logout.php" class="btn btn-danger">Sair</a>
      </div>
   </div>

   <div class="container mt-3">
      <h3>Bem vindo(a), usuário!</h3>
         <div class="btn-group mt-5" role="group" aria-label="Button group">
            <a href="" class="btn btn-info btn-lg active">Cursos</a>
            <a href="" class="btn btn-info btn-lg">Vagas</a>
            <a href="" class="btn btn-info btn-lg">Usuários</a>
            <a href="" class="btn btn-info btn-lg">Candidatos</a>
         </div>
   </div>
   
   <script src="../assets/js/jquery-3.4.1.min.js"></script>
	<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/script.js"></script>
</body>
</html>