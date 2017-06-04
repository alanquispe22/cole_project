<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body>
    <?php
    include("clase_usuario_padre.php");
    session_start();//reanudamos una session si es que la hay
    if(!isset($_SESSION["padre"])){
      //redirigimos si no existe la session
      header("location:../login_padre.php");
    }
    	require("nav_padre.php");
     ?>
     <div class="container-fluid">
     	<div class="row">
     		<div class="col-md-12">
     			<ul class="nav nav-pills">
     				<li class="active">
     					<a href="sector_padre.php">Inicio</a>
     				</li>
     				<li >
     					<a href="sector_padre_notas.php">Ver Notas</a>
     				</li>
     				<li >
     					<a href="sector_padre_comunicados.php">Comunicados</a>
     				</li>
     				<li class="dropdown pull-right">
     					 <a href="../cierre.php" data-toggle="dropdown" class="dropdown-toggle">Salir<strong class="caret"></strong></a>
     					 <a href="#" data-toggle="dropdown" class="dropdown-toggle">julio Cesar<strong class="caret"></strong></a>
     					<ul class="dropdown-menu">
     						<li>
     							<a href="#">Perfil</a>

     						</li>
     						<li>
     							<a href="#">Mensajes</a>
     						</li>
     						<li>
     							<a href="#">Cerrar Sesion</a>
     						</li>
     						<li class="divider">
     						</li>
     						<li>
     							<a href="#">Salir</a>
     						</li>

     					</ul>
     				</li>
     			</ul>
     			<div class="jumbotron">
     				<h2>
     					Hola Señor usuario!!
     				</h2>
     				<p>
     					Bienvenido a nuestro sistema de control de estudiantes, gracias por ser usuario de este sistema, aqui podra
     					enterarse o informarce todo respecto a su hijo(a)
     				</p>
     				<p>
     					<a class="btn btn-primary btn-large" href="#">Ver mas</a>
     				</p>
     			</div>
     			<h2>
     				Consejos Sobre el mejor aprendisaje de su hijo!!
     			</h2>
     			<p>
     				1.Permitamos que el niño se enfrente a sus dificultades desde pequeño.
     			</p>
     			<p>
     				2.Debemos fomentar que aprenda apensar por sí mismo.
     			</p>
     			<p>
     				3.Que haga actividades con otros niños en los que los adultos no estén siempre encima.
     			</p>
     			<p>
     				4.Es importanteno darles todo lo que pidan. Estamos pagando, piensa Álava, vivir en una sociedad donde todo se les regala, lo que impide que den valor a las cosas primero y después a las personas.
     			</p>
     			<p>
     				5.Los niños tienen que tener con sus padres un vínculo que les aporte seguridad y estabilidad. Pero unvínculosano, no de absoluta dependencia.
     			</p>
     			<p>
     				<a class="btn" href="#">ver detalles »</a>
     			</p>
     		</div>
     	</div>
     </div>

     <script src="../js/jquery.js"></script>
 	 	<script src="../js/bootstrap.min.js"></script>
  </body>
</html>
