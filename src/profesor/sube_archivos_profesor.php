<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../micss/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="../micss/estilo_principal.css">
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
  </head>
  <body>
    <?php
    include("../variables.php");
    include("claseComunicado.php");
    include("claseMateria.php");
    include("clase_usuario_profesor.php");
    include("../clase_archivo.php");
    session_start();
    if(!isset($_SESSION["profesor"])){
      header("location:../index.php");
    }
    require("nav_profesor.php");
    ?>
     <div class="container">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
              <ul class="nav nav-sidebar">
                <li><a href="sector_profesor_comunicados.php">Mis Comunicados</a></li>
                <li class="active"><a href="sube_archivos_profesor.php">Mis archivos</a></li>
              </ul>
            </div><br><br>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main well">
          <center><h2 class="titulo">Bienvenido de su bandeja de archivos</h2></center>
          <!--formulario para subir archivos-->
        <div class="editaMensaje">
          <form id="form" action="sube_archivos_profesor.php" enctype="multipart/form-data" method="post"><br>
                <label>Subir Archivos:<br>
                  (el nombre no debe tener caracteres especiales)</label>
                <input type="file" name="archivo" required><br>
                <input type="text" name="comentario" placeholder="comentario" required>
                <input type="hidden" value="" id="materi" name="materi">
                <input type="hidden" value="" id="grado" name="grado">
             <button type="submit"  class="btn btn-primary">Subir Archivo</button><br><br>
          </form>
          <?php
          $carpeta="../files/";
          opendir($carpeta);
          if(isset($_FILES['archivo']['tmp_name'])){
            if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
              //ALMACENAMOS UN ARCHIVO EN EL DIRECTORIO FILES
              $path=$carpeta.$_FILES['archivo']['name'];
              copy($_FILES['archivo']['tmp_name'],$path);
              //ALMACENAMOS LOS DATOS DEL ARCHIVO EN LA BASE DE DATOS
              try{
                $base=new PDO("mysql:host=".Variables::$db_host. ";dbname=".Variables::$db_nombre, Variables::$db_usuario,Variables::$db_password);
                $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $base->exec(Variables::$juego_caracteres);

                //OBTENEMOS EL ID_MATERIA CON AYUDA DEL GRADO DE LA MATERIA Y EL NOMBRE DE LA MATERIA
                $sql="SELECT ID_MATERIA FROM `materia` WHERE ID_GRADO=:gr and NOMBRE_MATERIA=:nome";
                $resultado=$base->prepare($sql);
                $resultado->execute(array(":gr"=>$_POST['grado'],":nome"=>$_POST['materi']));
                $registro=$resultado->fetch(PDO::FETCH_ASSOC);
                $id_materia=$registro['ID_MATERIA'];

                //INSERTANDO DATOS DEL NUEVO ARCHIVO
                $sql="INSERT INTO `archivo`( `NOMBRE_ARCHIVO`, `CI_PROFESOR`, `ID_MATERIA`, `COMENTARIO`)
                VALUES (:nomAr,:ci,:idm,:com)";
                $resultado=$base->prepare($sql);
                $resultado->execute(array(":nomAr"=>$_FILES['archivo']['name'],":ci"=>$_SESSION['profesor']->ci_profesor,":idm"=>$id_materia,":com"=>$_POST['comentario']));
                $numero_registro=$resultado->rowCount();
                if($numero_registro!=0)//si el usuario existe
                {
                    echo "Guardado correctamente en la BD";
                    $archivo=new Archivo($_FILES['archivo']['name'],"../files",$_POST['materi'],$_SESSION['profesor']->nombres,$_POST['comentario']);
                    $_SESSION["archivos"][sizeof($_SESSION["archivos"])]=$archivo;
                  }else{
                      echo "No se pudo guardar en la BD";
                  }
                  $resultado->closeCursor();
              } catch (Exception $e) {
                if(!isset($id_materia))echo "Debes elegir una materia en la pestaña superior";
                else{
                  echo "linea de error: " . $e->getLine()."</br>";
                  die("Error: " . $e->getMessage());
                }
              }
            }
          }
           ?>
        </div><br>
          <table class="table table-striped table-bordered table-hover" id="sha">
              <tr>
                <td><strong>Materia</strong></td>
                <td><strong>Profesor</strong></td>
                <td><strong>Comentario</strong></td>
                <td><strong>Link de Descarga</strong></td>
              </tr>
            <tbody>
              <?php
                $directorio=opendir("../files/");
                $MisArchivos=$_SESSION["archivos"];
                while($archivo=readdir($directorio)){
                  if($archivo!='.' && $archivo !='..'){
                    for($i=sizeof($MisArchivos)-1;$i>=0;$i--){
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
<script>
$(document).ready(function(){
$("#form").submit(function(){
 //Obtenemos la materia para la cual va el comunicado
var materiaGrado=document.getElementById("materia").innerHTML;


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
