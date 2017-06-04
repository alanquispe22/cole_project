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
				 <a class="navbar-brand" href="#">QR Consultory</a>
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
					 <a id="nuevo" href="padre/registra_padre.html" class="btn btn-primary ">Registrarme</a>
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
	 <div class="carousel-inner" role="listbox">
		 <div class="item active">
			 <img class="first-slide" src="img/colegio.jpg" alt="First slide">
			 <div class="container">
				 <div class="carousel-caption">
					 <h1>Example headline.</h1>
					 <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
					 <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
				 </div>
			 </div>
		 </div>
		 <div class="item">
			 <img class="second-slide" src="img/colegio1.jpg" alt="Second slide">
			 <div class="container">
				 <div class="carousel-caption">
					 <h1>Another example headline.</h1>
					 <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
					 <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
				 </div>
			 </div>
		 </div>
		 <div class="item">
			 <img class="third-slide" src="img/colegio2.jpg" alt="Third slide">
			 <div class="container">
				 <div class="carousel-caption">
					 <h1>One more for good measure.</h1>
					 <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
					 <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
				 </div>
			 </div>
		 </div>
	 </div>
	 <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		 <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		 <span class="sr-only">Previous</span>
	 </a>
	 <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		 <span class="sr-only">Next</span>
	 </a>
 </div><!-- /.carousel -->

	 <div class="container">
		 <!-- Example row of columns -->
		 <div class="row">
			 <div class="col-md-4">
				 <h2>Heading</h2>
				 <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
				 <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
			 </div>
			 <div class="col-md-4">
				 <h2>Heading</h2>
				 <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
				 <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
			</div>
			 <div class="col-md-4">
				 <h2>Heading</h2>
				 <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
				 <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
			 </div>
		 </div>
		 <hr>
		 <footer>
			 <p>&copy; 2016 Company, Inc.</p>
		 </footer>
	 </div> <!-- /container -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
