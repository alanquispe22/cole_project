<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	 <meta name="author" content="">
	 <link rel="icon" href="../../favicon.ico">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="micss/jumbotron.css" rel="stylesheet">
	 <link href="micss/carousel.css" rel="stylesheet">
	 <style media="screen">
	 	div.borde{
			text-decoration: line-through;
		}
	 </style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		 <div class="container">
			 <div class="navbar-header">
				 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					 <span class="sr-only">Toggle navigation</span>
					 <span class="icon-bar"></span>
					 <span class="icon-bar"></span>
					 <span class="icon-bar"></span>
				 </button>
				 <a class="navbar-brand" href="#">SICE "Sistema de control Estudiantil"</a>
			 </div>
			 <div id="navbar" class="navbar-collapse collapse">
				 <form action="comprueba_login.php" method="post" class="navbar-form navbar-right">
					 <div class="form-group">
						 <input type="text" name="usu" placeholder="Usuario" class="form-control">
					 </div>
					 <div class="form-group">
						 <input type="password" name="password" placeholder="Contraseña" class="form-control">
					 </div>
					 <button type="submit" class="btn btn-success">Ingresar</button>
					 <a id="nuevo" href="padre/registra_padre.php" class="btn btn-primary ">Registrarme</a>
				 </form>
			 </div><!--/.navbar-collapse -->
		 </div>
	 </nav>
	 <!-- Carousel
 ================================================== -->
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
	 <!-- Indicators -->
	 <ol class="carousel-indicators">
		 <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		 <li data-target="#myCarousel" data-slide-to="1"></li>
		 <li data-target="#myCarousel" data-slide-to="2"></li>
	 </ol>
	 <div class="carousel-inner borde" role="listbox">
		 <div class="item active">
			 <img class="first-slide" src="img/colegio.jpg" alt="First slide">
			 <div class="container">
				 <div class="carousel-caption">
					 <h1>Unidad Educativa “Mercedez Belzu de Dorado” </h1>
					 <p>Un colegio futurista Siempre pensando en el mejoramiento educativo.</p>
					 <p><a class="btn btn-lg btn-primary" href="#" role="button">Mas sobre el colegio</a></p>
				 </div>
			 </div>
		 </div>
		 <div class="item">
			 <img class="second-slide" src="img/colegio1.jpg" alt="Second slide">
			 <div class="container">
				 <div class="carousel-caption">
					 <h1>La tecnologia esta en nuestras manos.</h1>
					 <p>Solo es cuestion de saberla aprovechar.</p>
					 <p><a class="btn btn-lg btn-primary" href="#" role="button">Leer mas</a></p>
				 </div>
			 </div>
		 </div>
		 <div class="item">
			 <img class="third-slide" src="img/colegio2.jpg" alt="Third slide">
			 <div class="container">
				 <div class="carousel-caption">
					 <h1>Una herramienta mas para tí</h1>
					 <p>Es un sistema que te permite saber el como estan tus hijos en el colegio y dialogar con el profesor directamente.</p>
					 <p><a class="btn btn-lg btn-primary" href="#" role="button">Leer manual</a></p>
				 </div>
			 </div>
		 </div>
	 </div>
	 <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		 <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		 <span class="sr-only">anterior</span>
	 </a>
	 <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		 <span class="sr-only">siguiente</span>
	 </a>
 </div><!-- /.carousel -->

	 <div class="container">
		 <!-- Example row of columns -->
		 <div class="row">
			 <div class="col-md-4">
				 <h2>Compromiso</h2>
				 <p>Donde hay compromiso, hay ganancias hay progreso, estamos comprometidos con la educación de su hijo(a), tratando siempre de ser un segundo hogar para ellos. </p>
				 <p><a class="btn btn-default" href="#" role="button">Ver detalles &raquo;</a></p>
			 </div>
			 <div class="col-md-4">
				 <h2>Valor</h2>
				 <p>Mas valor y menos miedo es una de nuestras filosofias mas importantes</p>
				 <p><a class="btn btn-default" href="#" role="button">Ver detalles &raquo;</a></p>
			</div>
			 <div class="col-md-4">
				 <h2>Igualdad</h2>
				 <p>Promovemos la igualdad, todos tenemos derecho al uso de la tecnologia sin importar de donde vengamos, es un derecho que todos tenemos.</p>
				 <p><a class="btn btn-default" href="#" role="button">Ver detalles &raquo;</a></p>
			 </div>
		 </div>
		 <hr>
		 <footer>
			 <center><p>&copy; 2017 QR consultory.</p></center>
		 </footer>
	 </div> <!-- /container -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
