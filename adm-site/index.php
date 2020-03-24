<?php
require_once '../assets/classes/Usuario.php';
if(isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])){
   $id_usuario = addslashes($_SESSION['id_usuario']);
} else {
   header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
   <title>Adm - Byte Brasil</title>
</head>
<body>
   <div class="navbar navbar-expand-lg navbar-light bg-primary fixed-top container-fluid">
      <div class="container">
         <a class="navbar-brand">Brand</a>
      </div>
   </div>

   <script src="../assets/js/jquery-3.4.1.min.js"></script>
	<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/script.js"></script>
</body>
</html>