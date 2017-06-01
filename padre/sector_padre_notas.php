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
    <link href="../micss/style.css" rel="stylesheet" >
  </head>
  <body>
    <?php
    session_start();//reanudamos una session si es que la hay
    if(!isset($_SESSION["usuario"])){
      //redirigimos si no existe la session
      header("location:login_padre.php");
    }
     ?>
     <div class="container-fluid">
 	<div class="row">
 		<div class="col-md-12">
 			<ul class="nav nav-pills">
 				<li>
 					<a href="sector_padre.php">Inicio</a>
 				</li>
 				<li class="active">
 					<a href="sector_padre_notas.php">Notas</a>
 				</li>
 				<li>
 					<a href="sector_padre_comunicados.php">Comunicados</a>
 				</li>
 				<li class="dropdown pull-right">
 					 <a href="#" data-toggle="dropdown" class="dropdown-toggle">Ver mas<strong class="caret"></strong></a>
 					<ul class="dropdown-menu">
 						<li>
 							<a href="index.html">Inicio</a>
 						</li>
 						<li>
 							<a href="#">Mensajes</a>
 						</li>
 						<li>
 							<a href="#">Archivos descargados</a>
 						</li>
 						<li class="divider">
 						</li>
 						<li>
 							<a href="www.google.com">Salir</a>
 						</li>
 					</ul>
 				</li>
 			</ul>
 			<div class="row">
 				<div class="col-md-6">
 					<h2>
 						Notas
            <?php  ?>
 					</h2>
 					<p>
 						En este sector se difunden las notas parciales del alumno
 					</p>

 					<div class="comments-container">
 			        <ul id="comments-list" class="comments-list">
 			            <li>
 			                <div class="comment-main-level">
 			                    <!-- Avatar -->
 			                    <div class="comment-avatar"><img src="images/avatar_1.jpg" alt=""></div>
 			                    <!-- Contenedor del Comentario -->
 			                    <div class="comment-box">
 			                        <div class="comment-head">
 			                            <h6 class="comment-name">NOMBRE DEL COMENTARISTA</h6>
 			                            <span>hace 15 minutos</span>
 			                        </div>
 			                        <div class="comment-content">
 			                            TODO EL COMNETARIO QUE SE OBTENGA DE LA BD
 			                            <a id="modal-619186" href="#modal-container-619186" role="button" class="btn" data-toggle="modal">Responder</a>
 			                            <div class="modal fade" id="modal-container-619186" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 											<div class="modal-dialog">
 												<div class="modal-content">
 													<div class="modal-header">

 														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
 															×
 														</button>
 														<hr style="border:15px;"><hr style="border:2px;" />
 														<h4 class="modal-title" id="myModalLabel">
 															Mensaje...
 														</h4>

 													</div>

 													<div class="modal-body">
 														<textarea name="comentarios" rows="10" cols="40">Escribe aquí tus comentarios</textarea>
 													</div>
 													<div class="modal-footer">

 														<button type="button" class="btn btn-default" data-dismiss="modal">
 															Cancelar
 														</button>
 														<button href="index(1).html"  type="button" class="btn btn-primary" >
 															Enviar
 														</button>
 													</div>
 												</div>

 											</div>

 										</div>
 			                        </div>
 			                    </div>
 			                </div>

 			                <!-- Respuestas de los comentarios -->
 			                <ul class="comments-list reply-list">
 			                    <li>
 			                        <!-- Avatar -->
 			                        <div class="comment-avatar"><img src="images/avatar_2.jpg" alt=""></div>
 			                        <!-- Contenedor del Comentario -->
 			                        <div class="comment-box">
 			                            <div class="comment-head">
 			                                <h6 class="comment-name">NOMBRE DEL COMENTARISTA</h6>
 			                            <span>hace 10 minutos</span>
 			                        </div>
 			                        <div class="comment-content">
 			                            TODO EL COMNETARIO QUE SE OBTENGA DE LA BD
 			                            <a id="modal-619186" href="#modal-container-619186" role="button" class="btn" data-toggle="modal">Responder</a>
 			                            <div class="modal fade" id="modal-container-619186" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 											<div class="modal-dialog">
 												<div class="modal-content">
 													<div class="modal-header">

 														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
 															×
 														</button>
 														<hr style="border:15px;"><hr style="border:2px;" />
 														<h4 class="modal-title" id="myModalLabel">
 															Mensaje...
 														</h4>

 													</div>

 													<div class="modal-body">
 														<textarea name="comentarios" rows="10" cols="40">Escribe aquí tus comentarios</textarea>
 													</div>
 													<div class="modal-footer">

 														<button type="button" class="btn btn-default" data-dismiss="modal">
 															Cancelar
 														</button>
 														<button href="index(1).html"  type="button" class="btn btn-primary" >
 															Enviar
 														</button>
 													</div>
 												</div>

 											</div>

 										</div>
 			                        </div>
 			                        </div>
 			                    </li>
 			                </ul>
 			            </li>

 			            <li>
 			                <div class="comment-main-level">
 			                    <!-- Avatar -->
 			                    <div class="comment-avatar"><img src="images/avatar_2.jpg" alt=""></div>
 			                    <!-- Contenedor del Comentario -->
 			                    <div class="comment-box">
 			                        <div class="comment-head">
 			                            <h6 class="comment-name">NOMBRE DEL COMENTARISTA</h6>
 			                            <span>hace 20 minutos</span>
 			                        </div>
 			                        <div class="comment-content">
 			                            TODO EL COMNETARIO QUE SE OBTENGA DE LA BD
 			                            <a id="modal-619186" href="#modal-container-619186" role="button" class="btn" data-toggle="modal">Responder</a>
 			                            <div class="modal fade" id="modal-container-619186" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 											<div class="modal-dialog">
 												<div class="modal-content">
 													<div class="modal-header">

 														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
 															×
 														</button>
 														<hr style="border:15px;"><hr style="border:2px;" />
 														<h4 class="modal-title" id="myModalLabel">
 															Mensaje...
 														</h4>

 													</div>

 													<div class="modal-body">
 														<textarea name="comentarios" rows="10" cols="40">Escribe aquí tus comentarios</textarea>
 													</div>
 													<div class="modal-footer">

 														<button type="button" class="btn btn-default" data-dismiss="modal">
 															Cancelar
 														</button>
 														<button href="index(1).html"  type="button" class="btn btn-primary" >
 															Enviar
 														</button>
 													</div>
 												</div>

 											</div>

 										</div>
 			                        </div>
 			                    </div>
 			                </div>
 			            </li>
 			        </ul>
 			    </div>

 				</div>

 			</div>
 		</div>
 	</div>
 </div>

     <script src="../js/jquery.min.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <script src="../js/scripts.js"></script>

  </body>
</html>
