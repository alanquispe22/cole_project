<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../micss/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="../micss/estilo_principal.css">

    <script>

    //script que sirve para subir los comunicados
      function publicaComunicado(comunicado){
        /*var fecha = new Date();
        var fech=fecha.getDate()+"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear());
        var hora=fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
        alert(fech+" "+hora);*/
        //definimos un array
        document.getElementById("comunicado").value="";
        var fecha=" 14:51 05/05/17";
        var materia=document.getElementById("materia").innerHTML;
        alert(materia);
        var parametros = {
                "fecha" : fecha,
                "materia" : materia,
                "comunicado" : comunicado
        };
        //envio mediante ajax
        $.ajax({
                data:  parametros,//contenido que se envia
                url:   'publica_comunicado.php',//direccion del archivo q lo recibira
                type:  'post',
                //metodo: accion mientras se procesa el envio
                beforeSend: function () {
                        $("#res").html("Procesando, espere por favor...");
                },
                //metodo: response es el resultado devuelto
                success:  function (response) {
                        $("#res").html(response);
                }
        });
      }
      </script>
  </head>
  <body>
    <?php
    include("claseComunicado.php");
    include("claseMateria.php");
    include("clase_usuario_profesor.php");
    session_start();
    if(!isset($_SESSION["profesor"])){
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
          <form>
            <label for="text">Puede comunicar algo a su curso:</label><br>
            <textarea  id="comunicado" class="form-control" rows="3" cols="23" placeholder="Deseas comunicar algo?" required="on"></textarea><br>
            <button type="button" class="btn btn-success green" onclick="publicaComunicado($('#comunicado').val());return false;">Publicar</button>
          </form>
          <span id="res"></span>
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
