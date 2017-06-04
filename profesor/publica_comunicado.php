<?php
include("claseComunicado.php");
include("claseMateria.php");
include("clase_usuario_profesor.php");
session_start();
if(!isset($_SESSION["profesor"])){
  header("location:../index.php");
}
$fecha=$_POST["fecha"];
$comunicado=$_POST["comunicado"];
$materia=$_POST["materia"];
try{
  $base=new PDO("mysql:host=localhost; dbname=colegio", "root","");
  $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $base->exec("SET CHARACTER SET utf8");
  $sql="SELECT ID_MATERIA FROM MATERIA WHERE NOMBRE_MATERIA=:nom";
  //INSERT INTO `comunicado`(`FECHA`, `MENSAJE`, `ID_PROFESOR`, `ID_MATERIA`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":nom"=>$_materia));
  $registro=$resultado->fetch(PDO::FETCH_ASSOC);

  $resultado->closeCursor();
 header("location:sector_profesor.php");
} catch (Exception $e) {//$e es objeto y getMessage() es uno de sus metodos
  die("Error: " . $e->getMessage());
  //echo "linea de error: " . $e->getLine();
}
?>
