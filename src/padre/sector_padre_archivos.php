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
    include("clase_usuario_padre.php");
    include("../clase_archivo.php");
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
             <li><a href="sector_padre_comunicados.php">Mis Comunicados</a></li>
             <li class="active"><a href="sector_padre_archivos.php">Descargas</a></li>
           </ul>
         </div><br><br>
         <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main well">
           <center><h2 class="titulo">Bienvenido de su bandeja de archivos</h2></center>
           <!--formulario para subir archivos-->
           <table id="sha" class="table table-striped table-bordered table-hover">
               <tr>
                 <td><strong>Materia</strong></td>
                 <td><strong>Profesor</strong></td>
                 <td><strong>Comentario</strong></td>
                 <td><strong>Link de descarga</strong></td>
               </tr>
             <tbody>
               <?php
                 $directorio=opendir("../files/");
                 $MisArchivos=$_SESSION["archivos"];
                 while($archivo=readdir($directorio)){
                   if($archivo!='.' && $archivo !='..'){
                     for($i=0;$i<sizeof($MisArchivos);$i++){
                       if(($MisArchivos[$i]->nombre)==$archivo){
                         echo "<tr>
                         <td>
                           {$MisArchivos[$i]->materia}
                         </td>
                         <td>
                           {$MisArchivos[$i]->profesor}
                         </td>
                         <td>
                           {$MisArchivos[$i]->comentario}
                         </td>
                           <td>
                             <a href='../descargas.php?archivo=$archivo'>$archivo</a>
                           </td>
                         </tr>";
                       }
                     }
                   }
                 }
                ?>
             </tbody>
           </table>
         </div>
       </div>
     </div>
     <script src="../js/jquery.js"></script>
 	 	<script src="../js/bootstrap.min.js"></script>
  </body>
</html>
