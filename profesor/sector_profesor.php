
<!DOCTYPE >
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Pagina de Inicio Profesores</title>
<link href="../micss/default.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="../micss/style (2).css">

<script>
		function poner(){
		var com=(document.Documento.comentarios.value);
		document.Documento.comen.value=com;
		}
</script>
</head>
<body>
	<?php
	session_start();//reanudamos una session si es que la hay
	if(!isset($_SESSION["usuario"])){
		//redirigimos si no existe la session
		header("location:login_profesor.php");
	}

	try{
		$base=new PDO("mysql:host=localhost; dbname=colegio", "root","");
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");
		$sql="SELECT * FROM PROFESOR WHERE USUARIO= :login AND PASSWORD= :password";
		$resultado=$base->prepare($sql);
		$usu=$_SESSION["usuario"];
		$password=$_SESSION["password"];
		$resultado->execute(array(":login"=>$usu, ":password"=>$password));
		//obteniendo datos personales del profesor
		$registro=$resultado->fetch(PDO::FETCH_ASSOC);
		$nombres=$registro['NOMBRES'];
		$apellidos=$registro['APELLIDOS'];
		$usuario=$registro['USUARIO'];
		$id=$registro['ID_PROFESOR'];
		//obteniendo comunicados del profesor
		$sql="SELECT * FROM COMUNICADO WHERE ID_PROFESOR=:id";
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":id"=>$id));
		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
			echo $registro['FECHA'] . "<br>";
			echo $registro['MENSAJE'] . "<br>";
			echo "<br>";
		}

		$resultado->closeCursor();
	} catch (Exception $e) {
		die("Error: " . $e->getMessage());
	}
	 ?>
<div id="header">
	<div id="logo">
		<h1><?php echo $usuario; ?></h1>
	</div>
	<div id="menu-bg">
		<div id="menu">
			<li><a href="sector_profesor.php"><h3>Inicio</h3></a></li>
			<li><a href="#"><h3>Nuevo</h3></a></li>
			<li><a href="sube_archivos_profesor.php"><h3>Subir Archivos</h3></a></li>
			<li><a href="#"><h3>Nuevo</h3></a></li>
		</div>
	</div>
</div>
	<div id="page">
		<div id="content">
				<p><h1 class="title">Comunicados</h1></p>
				<!--formulario para q el profesor suba comunicados-->
				<form action="publica_comunicado.php" method="post" name="Documento">
					<textarea name="comunicado" rows="4" cols="60" backgroud=#123456></textarea>
				<p>
					<button type="submit" name="borrar">Borrar</button>
					<button type="submit" name="publicar">Publicar</button>
				</p>
      	</form>
				<!-- Contenedor Principal -->
			    <div class="comments-container">
			        <ul id="comments-list" class="comments-list">
			            <li>
			                <div class="comment-main-level">
			                    <!-- Avatar -->
			                    <div class="comment-avatar"><img src="img/avatar_1.jpg" alt=""></div>
			                    <!-- Contenedor del Comentario -->
			                    <div class="comment-box">
			                        <div class="comment-head">
			                            <h6 class="comment-name">NOMBRE DEL COMENTARISTA</h6>
			                            <span>hace 20 minutos</span>
			                        </div>
			                        <div class="comment-content">
			                            TODO EL COMNETARIO QUE SE OBTENGA DE LA BD
			                        </div>
			                    </div>
			                </div>

			                <!-- Respuestas de los comentarios -->
			                <ul class="comments-list reply-list">
			                    <li>
			                        <!-- Avatar -->
			                        <div class="comment-avatar"><img src="img/avatar_2.jpg" alt=""></div>
			                        <!-- Contenedor del Comentario -->
			                        <div class="comment-box">
			                            <div class="comment-head">
			                                <h6 class="comment-name">NOMBRE DEL COMENTARISTA</h6>
			                            <span>hace 20 minutos</span>
			                        </div>
			                        <div class="comment-content">
			                            TODO EL COMNETARIO QUE SE OBTENGA DE LA BD
			                        </div>
			                        </div>
			                    </li>
			                </ul>
			            </li>
			            <li>
			                <div class="comment-main-level">
			                    <!-- Avatar -->
			                    <div class="comment-avatar"><img src="img/avatar_2.jpg" alt=""></div>
			                    <!-- Contenedor del Comentario -->
				                    <div class="comment-box">
				                        <div class="comment-head">
				                            <h6 class="comment-name">NOMBRE DEL COMENTARISTA</h6>
				                            <span>hace 20 minutos</span>
				                        </div>
				                        <div class="comment-content">
				                            TODO EL COMNETARIO QUE SE OBTENGA DE LA BD
				                        </div>
				                    </div>
			                </div>
			            </li>
			        </ul>
			    </div>
		</div>
	</div>
	<div id="sidebar"> <img src="../img/colegios.jpg"><img src="../img/img_437552.jpg"></div>
</div>
</html>
