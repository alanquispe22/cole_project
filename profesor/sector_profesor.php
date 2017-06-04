<!DOCTYPE >
<html>
<head>
<meta charset="UTF-8">
<title>Pagina de Inicio Profesores</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link href="../micss/dashboard.css" rel="stylesheet">
</head>
<body>
	<?php
	include("claseComunicado.php");
	include("claseMateria.php");
	include("clase_usuario_profesor.php");

	session_start();//reanudamos una session si es que la hay
	if(!isset($_SESSION["profesor"])){
		//redirigimos si no existe la session
		header("location:../index.php");
	}

	require("nav_profesor.php");
	?>

	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
					<li class="active"><a href="sector_profesor_comunicados.php">Mis Comunicados</a></li>
					<li><a href="sube_archivos_profesor.php">Subir archivos</a></li>
					<li><a href="#">Iniciar Discusion</a></li>
					<li><a href="#">Subir Notas</a></li>

				</ul>
				<ul class="nav nav-sidebar">
					<li><a href="#">Exportar</a></li>
					<li><a href="#">Reportes</a></li>
					<li><a href="">Descargas</a></li>
				</ul>
			</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

			</div>
		</div>
	</div>

    <script src="../js/jquery.js"></script>
	 	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
