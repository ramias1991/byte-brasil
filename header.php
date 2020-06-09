<?php

require_once 'config.classes.php';

$title = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$array = explode("/", $title);
$title = $array[count($array) - 1];
$title = " - " . ucfirst($txt_title = str_replace(".php", "", $title));
if($title == ' - Home'){
    $title = '';
}
if(strstr($title, 'id') || strstr($title, 'pag')){
	$arrayUrl = explode("?", $title);
	if($arrayUrl[0] == ' - Curso'){
		$id_curso = $_GET['id'];
		$cursos = new Cursos();
		$curso = $cursos->getCurso($id_curso);
		$title = '- Curso de ' . $curso['titulo'];
	} else{
		$title = $arrayUrl[0];
	}
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<meta http-equiv="Content-Language" content="pt-br">
	<title>Byte Brasil <?=$title?> </title>
	<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
	<meta name="ProgId" content="FrontPage.Editor.Document">
	<meta name="keywords" content="byte, byte brasil, curso de informática, curso profissionalizante, agência de emprego, venda de informática, concórdia, unifacvest, vaga de emprego, concurso concórdia"> 
	<meta name="description" content="Byte Brasil, curso de informática, curso profissionalizante, agência de emprego, graduação a distância, universidade"> 
	<meta name="Microsoft Theme" content="arctic 011">
</head>
<body class="bg-light">
	<nav class="navbar navbar-expand-lg container-fluid navbar-dark bg-info fixed-top">
		<div class="container">
			<a href="home" class="navbar-brand <?=($title == "")?'text-light':'text-dark'?>">Byte Brasil</a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menuOptions">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="menuOptions">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item <?=($title == " - Cursos")?'active':''?>">
						<a href="cursos" class="nav-link">Cursos</a>
					</li>
					<li class="nav-item <?=($title == " - Vagas")?'active':''?>">
						<a href="vagas" class="nav-link">Empregos</a>
					</li>
					<li class="nav-item <?=($title == " - Graduacao")?'active':''?>">
						<a href="graduacao" class="nav-link">Graduação</a>
					</li>
					<li class="nav-item <?=($title == " - Pos-graduacao")?'active':''?>">
						<a href="pos-graduacao" class="nav-link">Pós-Graduação</a>
					</li>
					<li class="nav-item <?=($title == " - Idiomas")?'active':''?>">
						<a href="idiomas" class="nav-link">Idiomas</a>
					</li>
					<li class="nav-item <?=($title == " - Parceiros")?'active':''?>">
						<a href="parceiros" class="nav-link">Parceiros</a>
					</li>
					<li class="nav-item">
						<a href="fale-conosco" class="nav-link <?=($title == " - Fale-conosco")?'text-light':'text-dark'?>">Fale Conosco</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="w-100 mt-navbar">
		<img src="assets/img/logosite.jpg" alt="Imagem Logo Byte Brasil" class="w-100 img-fluid">
	</div> 