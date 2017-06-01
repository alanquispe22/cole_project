<?php
$usuario=$_POST["usuario"];
$password=$_POST["password"];
$nombres=$_POST["nombres"];
$apellidos=$_POST["apellidos"];
$telefono=$_POST["telefono"];
try{
  $base=new PDO("mysql:host=localhost; dbname=colegio", "root","");
  $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $base->exec("SET CHARACTER SET utf8");
  $sql="INSERT INTO `padre` (`NOMBRES`, `APELLIDOS`, `TELEFONO`,`USUARIO`,`PASSWORD`) VALUES
  (:nom, :ape, :tel,:usu,:pas)";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":nom"=>$nombres,":ape"=>$apellidos,
        ":tel"=>$telefono,":usu"=>$usuario,":pas"=>$password));
 echo "padre registrado en la base de datos";
 $resultado->closeCursor();
} catch (Exception $e) {//$e es objeto y getMessage() es uno de sus metodos
  die("Error: " . $e->getMessage());
  //echo "linea de error: " . $e->getLine();
}
 ?>
