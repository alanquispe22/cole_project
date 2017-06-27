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
    <link href="../micss/dashboard.css" rel="stylesheet">
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
  </head>
  <body>
    <?php
    include("../variables.php");
    include("clase_comunicado_padre.php");
    include("clase_usuario_padre.php");
    session_start();//reanudamos una session si es que la hay
    if(!isset($_SESSION["padre"])){
      //redirigimos si no existe la session
      header("location:../index.php");
    }
      require("nav_padre.php");
     ?>
     <div class="container">
       <div class="row">
         <div class="col-sm-3 col-md-2 sidebar">
           <ul class="nav nav-sidebar">
             <li class="active"><a href="sector_padre_comunicados.php">Mis Comunicados</a></li>
             <li><a href="sector_padre_archivos.php">Descargas</a></li>
           </ul>
         </div><br><br>
         <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main well" >
           <!---code-start---------------->
                <?php
                try{
                  $base=new PDO("mysql:host=".Variables::$db_host. ";dbname=".Variables::$db_nombre, Variables::$db_usuario,Variables::$db_password);
                  $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  $base->exec(Variables::$juego_caracteres);
                  //OBTENEMOS LOS COMUNICADOS QUE LE COMPETEN A ESTE PADRE
                  $sql="SELECT NOMBRES, FECHA, MENSAJE, NOMBRE_MATERIA, ID_GRADO, FOTO_PATH
                  FROM COMUNICADO as c,MATERIA as m, PROFESOR as p
                  WHERE m.ID_MATERIA=c.ID_MATERIA and m.ID_GRADO=:grado and p.CI_PROFESOR=c.CI_PROFESOR";
                  $resultado=$base->prepare($sql);
                  $resultado->execute(array(":grado"=>$_SESSION['padre']->id_grado));
                  for($i=0;$registro=$resultado->fetch(PDO::FETCH_ASSOC);$i++)
                    $MisComunicados[$i]=new Comunicado($registro['NOMBRES'],"../foto_perfil/".$registro['FOTO_PATH'],$registro['FECHA'],$registro['MENSAJE'],$registro['NOMBRE_MATERIA'].$registro['ID_GRADO']);
                  if(isset($MisComunicados)){
                  for($i=count($MisComunicados)-1;$i>=0;$i--) {?>
                    <div class="well" id="sha">
                            <a class="pull-left" href="#" id="imagen">
                                <img class="media-object" src="<?php  echo $MisComunicados[$i]->foto_path; ?>" width="45">
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading"><?php echo $MisComunicados[$i]->autor; ?></h3>
                                <h4 class="media-heading"><?php echo $MisComunicados[$i]->materia; ?></h4>
                                <p><?php echo $MisComunicados[$i]->comunicado; ?></p>
                                <ul class="list-inline list-unstyled">
                                    <li><span><a href="#"><i class="glyphicon glyphicon-calendar"></i> <?php echo $MisComunicados[$i]->fecha; ?></a></span></li>
                                    <li>|</li>
                                    <span><a href="#"><i class="glyphicon glyphicon-comment"></i> 2 comentarios</a></span>
                                </ul>
                            </div>
                    </div>
                    <?php
                  }}?>
                  <?php
                  $resultado->closeCursor();
                } catch (Exception $e) {//$e es objeto y getMessage() es uno de sus metodos
                  echo "linea de error: " . $e->getLine()."<br>";
                  die("Error: " . $e->getMessage());
                }
                 ?>
           <!----Code------end----------------------------------->
         </div>
       </div>
     </div>
     <script src="../js/jquery.js"></script>
 	 	<script src="../js/bootstrap.min.js"></script>
  </body>
</html>
