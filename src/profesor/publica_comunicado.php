<?php
include("../conection.php");
session_start();
if(!isset($_SESSION["profesor"])){
  header("location:../index.php");
}
$comunicado=$_POST["comunicado"];
$materia=$_POST["materi"];
$grado=$_POST["grado"];
$date=getdate();
$fecha=$date['mday']."-".$date['month']."-".$date['year'];
try{
  $conection=new Conection();

  //OBTENEMOS EL ID DE LA MATERIA A LA QUE PERTENECE EL COMUNICADO
  $sql="SELECT `ID_MATERIA` FROM `materia` WHERE `NOMBRE_MATERIA`=:nom and `ID_GRADO`=:grado";
  $params=array(":nom"=>$materia,":grado"=>$grado);
  $id_materia=$conection->getRegistro($sql,$params)['ID_MATERIA'];

  //INSERTAMOS EL COMUNICADO
  $sql="INSERT INTO `comunicado`(`FECHA`, `MENSAJE`, `CI_PROFESOR`, `ID_MATERIA`) VALUES (:fech,:men,:cip,:idm)";
  $params=array(":fech"=>$fecha,":men"=>$comunicado,":cip"=>($_SESSION["profesor"]->ci_profesor),":idm"=>$id_materia);
  $conection->afectaRegistro($sql,$params);
  $conection->cierraConection();
  header("location: sector_profesor_comunicados.php");
} catch (Exception $e) {
  if(!isset($id_materia))echo "Debes elegir una materia en la pestaña superior";
  else{
    echo "linea de error: " . $e->getLine()."</br>";
    die("Error: " . $e->getMessage());
  }
}
?>
