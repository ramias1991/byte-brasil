<?php
require_once 'config.php';
require_once 'assets/classes/Cursos.php';
require_once 'assets/classes/Vagas.php';
$title = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$array = explode("/", $title);
$title = $array[count($array) - 1];
$title = " - " . ucfirst($txt_title = str_replace(".php", "", $title));
if($title == ' - Index'){
    $title = null;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<meta http-equiv="Content-Language" content="pt-br">
	<title>Byte Brasil <?php echo $title;?> </title>
	<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
	<meta name="ProgId" content="FrontPage.Editor.Document">
	<meta name="keywords" content="byte, byte brasil, curso de informática, curso profissionalizante, agência de emprego, venda de informática, concórdia, unifacvest, vaga de emprego, concurso concórdia"> 
	<meta name="description" content="Byte Brasil, curso de informática, curso profissionalizante, agência de emprego, graduação a distância, universidade"> 
	<meta name="Microsoft Theme" content="arctic 011">
</head>
<body class="bg-light">
	<div class="container mt-navbar">
		<div class="row">
			<div class="col-12">
				<img src="assets/img/logosite.jpg" alt="Imagem Logo Byte Brasil" class="w-100 img-fluid">
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg container-fluid navbar-dark bg-primary fixed-top">
		<div class="container">
			<a href="index.php" class="navbar-brand">Byte Brasil</a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menuOptions">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="menuOptions">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="index.php" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="cursos.php" class="nav-link">Cursos</a>
					</li>
					<li class="nav-item">
						<a href="vagas.php" class="nav-link">Empregos</a>
					</li>
					<li class="nav-item">
						<a href="graduacao.php" class="nav-link">Graduação</a>
					</li>
					<li class="nav-item">
						<a href="pos-graduacao.php" class="nav-link">Pós-Graduação</a>
					</li>
					<li class="nav-item">
						<a href="idiomas.php" class="nav-link">Idiomas</a>
					</li>
					<li class="nav-item">
						<a href="parceiros.php" class="nav-link">Parceiros</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>