<!DOCTYPE >
<html>
<head>
<meta charset="UTF-8">
<title>Pagina de Inicio Profesores</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link href="../micss/dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="../micss/estilo_principal.css">
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
				<!-- First Featurette -->
				<div class="featurette" id="about">
						<div class="container content">
								<div class="row">
										<div class="col-md-6 col-md-offset-3">
												<div class="testimonials">
														<div class="active item">
																<blockquote>
																		<p>Mohtashim is an MCA from AMU (Aligarah) and a Project Management Professional. He has more than 17 years of experience in Telecom and Datacom industries covering complete SDLC. He is managing in-house innovations, business planning, implementation, finance and the overall business development of Tutorials Point.</p>
																</blockquote>
																<div class="carousel-info">
																		<img alt="" src="#" class="pull-left">
																		<div class="pull-left">
																				<span class="testimonials-name">Mohtashim M.</span>
																				<span class="testimonials-post">Founder & Managing Director</span>
																		</div>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
			</div>
		</div>
	</div>

    <script src="../js/jquery.js"></script>
	 	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
