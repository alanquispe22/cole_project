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
  $sql="SELECT `ID_MATERIA` FROM `materia` WHERE `NOMBRE_MATERIA`=:nom";  
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":nom"=>$materia));
  $registro=$resultado->fetch(PDO::FETCH_ASSOC);
  $id_materia=$registro['ID_MATERIA'];

  //insertando comunicado
  $base=new PDO("mysql:host=localhost; dbname=colegio", "root","");
  $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $base->exec("SET CHARACTER SET utf8");
  $sql="INSERT INTO `comunicado`(`FECHA`, `MENSAJE`, `ID_PROFESOR`, `ID_MATERIA`) VALUES (:fech,:men,:idp,:idm)";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":fech"=>$fecha,":men"=>$comunicado,":idp"=>($_SESSION["profesor"]->id_profesor),":idm"=>$id_materia));
  $resultado->closeCursor();
  echo "exito";
} catch (Exception $e) {//$e es objeto y getMessage() es uno de sus metodos
  die("Error: " . $e->getMessage());
  //echo "linea de error: " . $e->getLine();
}
?>
