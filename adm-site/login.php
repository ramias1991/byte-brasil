<?php
require_once '../config.classes.php';
$usuario = new Usuario();

if(isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])){
   $id_usuario = addslashes($_SESSION['id_usuario']);
   header("Location: ../adm-site");
}

if(isset($_POST['email']) && !empty($_POST['email'])){
   $email = addslashes($_POST['email']);
   $senha = addslashes($_POST['senha']);
   $usuario->login($email, $senha);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
   <title>Login</title>
</head>
<body>
   <div class="container">
      <div class="col-lg-6 col-md-8 col-sm-10 m-auto">
         <div class="card mt-5">
            <div class="card-header bg-primary">
               <h4 class="card-title">Login</h4>
            </div>
            <div class="card-body">
               <form method="POST">
                  <div class="form-group">
                     <label for="email">E-mail</label>
                     <input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
                  </div>
                  <div class="form-group">
                     <label for="senha">Senha</label>
                     <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                  </div>

                  <input type="submit" value="Entrar" class="btn btn-primary w-100">
               </form>
            </div>
         </div>
      </div>
   </div>

   <script src="../assets/js/jquery-3.4.1.min.js"></script>
	<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/script.js"></script>
</body>
</html>