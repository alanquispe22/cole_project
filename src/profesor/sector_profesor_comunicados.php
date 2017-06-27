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
    <style>
    #imagen{
        margin-right: 15px;
    }
    #sha{
      -webkit-box-shadow:0px 0px 18px 0px rgba(48,50,50,0.48);
      moz-box-shadow:    0px 0px 18px 0px rgba(48,50,50,0.48);
      box-shadow:        0px 0px 18px 0px rgba(48,50,50,0.48);
    }
    </style>
    <script>
      function enviaComunciados(comunicado, materia, grado){
        //definimos el JSON
        var datos = {
                "comunicado"  : comunicado,
                "materia"     : materia,
                "grado"       : grado
        };

        //envio mediante ajax
        $.ajax({
                data:  datos,
                url:   'publica_comunicado.php',
                type:  'post',

                //metodo: accion mientras se procesa el envio
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },

                //metodo: response es el resultado devuelto
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
      }
      </script>
  </head>
  <body>
    <?php
    include("../variables.php");
    include("claseComunicado.php");
    include("claseMateria.php");
    include("clase_usuario_profesor.php");
    session_start();
    if(!isset($_SESSION["profesor"])){
      header("location:../index.php");
    }
    require("nav_profesor.php");
    ?><br>
     <div class="container">
   		<div class="row">
   			<div class="col-sm-3 col-md-2 sidebar">
   				<ul class="nav nav-sidebar">
   					<li class="active"><a href="sector_profesor_comunicados.php">Mis Comunicados</a></li>
   					<li><a href="sube_archivos_profesor.php">Mis archivos</a></li>
   				</ul>
   			</div><br>
   			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main well">
          <form id="form" action="publica_comunicado.php" method="POST">
            <h3><small>Escriba aqui su comunicado:</small></h3>
            <textarea  name="comunicado" id="comunicado" class="form-control" rows="3" cols="23" placeholder="Deseas comunicar algo?" required="on"></textarea><br>
            <input type="hidden" value="" id="materi" name="materi">
            <input type="hidden" value="" id="grado" name="grado">
            <button type="submit" class="btn btn-success green">Publicar</button>
          </form><br>
          <!--code-start---------->
          <?php
              try{
              $base=new PDO("mysql:host=".Variables::$db_host. ";dbname=".Variables::$db_nombre, Variables::$db_usuario,Variables::$db_password);
              $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
              $base->exec(Variables::$juego_caracteres);
              $sql="SELECT comunicado.FECHA, comunicado.MENSAJE, materia.NOMBRE_MATERIA, materia.ID_GRADO
               FROM COMUNICADO inner join MATERIA ON COMUNICADO.ID_MATERIA=MATERIA.ID_MATERIA
               WHERE comunicado.CI_PROFESOR=:id";
               $resultado=$base->prepare($sql);
               $resultado->execute(array(":id"=>$_SESSION['profesor']->getCiProfesor()));
               for($i=0;$registro=$resultado->fetch(PDO::FETCH_ASSOC);$i++)
                 $MisComunicados[$i]=new Comunicado($_SESSION["profesor"],$registro['FECHA'],$registro['MENSAJE'],$registro['NOMBRE_MATERIA'].$registro['ID_GRADO']);
              if(isset($MisComunicados))
                $_SESSION["comunicados"]=$MisComunicados;
              $resultado->closeCursor();
              } catch (Exception $e) {
                  echo "linea de error: " . $e->getLine()."<br>";
                  die("Error: " . $e->getMessage());
                }
            ?>
               <?php
              if(isset($_SESSION['comunicados']))
              for ($i= count($_SESSION['comunicados'])-1; $i >=0; $i--) {
                ?>
                <div class="well" id="sha">
                        <a class="pull-left" href="#">
                            <img class="media-object" id="imagen" src="<?php $path=Variables::$ruta_foto_perfil_padre . $_SESSION['profesor']->foto_path; echo $path; ?>" alt="45" width="45">
                        </a>
                        <div class="media-body">
                            <h3 class="media-heading"><?php echo $_SESSION['comunicados'][$i]->autor->nombres; ?></h3>
                            <h4 class="media-heading"><?php echo $_SESSION['comunicados'][$i]->materia; ?></h4>
                            <p><?php echo $_SESSION['comunicados'][$i]->comunicado; ?></p>
                            <ul class="list-inline list-unstyled">
                                <li><span><a href="#"><i class="glyphicon glyphicon-calendar"></i><?php echo $_SESSION['comunicados'][$i]->fecha; ?></a></span></li>
                            </ul>
                        </div>
                </div>
              <?php
              }
               ?>
          <!--Code-end-->
   			</div>
   		</div>
   	</div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
        <script>
    $(document).ready(function(){
      $("#form").submit(function(){
        var comunicado=$("#comunicado").val();
        if(comunicado==""){
          alert("Debe ingresar su comunicado!!");
          return;}

         //Obtenemos la materia para la cual va el comunicado
        var materiaGrado=document.getElementById("materia").innerHTML
        //Extraemos el ultimo caracter de la materia ya que este indica el grado de esta:
        var grado=materiaGrado.charAt(materiaGrado.length-1);
        $("#grado").attr("value",grado);

        //obtenemos la materia sin el grado
        var materia=materiaGrado.substring(0,materiaGrado.length-1);
        $("#materi").attr("value",materia);
      });
    });

      </script>
  </body>
</html>
