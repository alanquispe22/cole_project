<?php
  session_start();
  if(!isset($_SESSION['usuario']))
    header("location: ../index.php");
  include("clase_usuario_padre.php");
  try{
  $base=new PDO("mysql:host=localhost; dbname=colegio", "root","");
  $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $base->exec("SET CHARACTER SET utf8");

  $sql="SELECT * FROM padre WHERE ID_USUARIO= :id";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":id"=>$_SESSION["id_usuario"]));
  $registro=$resultado->fetch(PDO::FETCH_ASSOC);

  //Datos del padre logeado
  $imagen = $registro['FOTO']; // Datos binarios de la imagen.
  $tipo = $registro['TIPO_IMAGEN'];  // Mime Type de la imagen.
  $padre=new Padre($registro['NOMBRES'],$registro['APELLIDOS'],$_SESSION['usuario'],$_SESSION['password'],$imagen,$registro['ID_PADRE'],$_SESSION['id_usuario'],$registro['GRADO_PADRE'],$tipo);
  unset($_SESSION['usuario']);
  unset($_SESSION['password']);
  unset($_SESSION['id_usuario']);
  $_SESSION['padre']=$padre;
  $resultado->closeCursor();
  header("location: sector_padre.php");
  } catch (Exception $e) {
   die("Error: " . $e->getMessage());
  }
?>
