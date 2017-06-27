<?php
include("../variables.php");
include("clase_usuario_padre.php");
session_start();//reanudamos una session si es que la hay
if(!isset($_SESSION["padre"])){
  //redirigimos si no existe la session
  header("location:../index.php");
}

try{
  $base=new PDO("mysql:host=".Variables::$db_host. ";dbname=".Variables::$db_nombre, Variables::$db_usuario,Variables::$db_password);
  $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $base->exec(Variables::$juego_caracteres);

  //VERIFICAR LA FOTO
  if (isset($_FILES["imagen"]) &&  $_FILES["imagen"]["error"] == 0){
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;
    if (!in_array($_FILES['imagen']['type'], $permitidos) || !($_FILES['imagen']['size'] <= $limite_kb*1024)){
      echo "El archivo no es de un tipo permitido o es demasiado grande";
      exit();
    }
    $sql="UPDATE `padre` SET `FOTO_PATH`=:fot  WHERE `USUARIO`=:usu";
    $resultado=$base->prepare($sql);
    $resultado->execute(array(":fot"=>$_FILES['imagen']['name'],":usu"=>$_SESSION['padre']->usuario));

    //ALMACENAMOS LA FOTO DE ESTE NUEVO PADRE
    $carpeta="../foto_perfil/";
    opendir($carpeta);
    //ALMACENAMOS UN ARCHIVO EN EL DIRECTORIO FILES
    $path=$carpeta.$_FILES['imagen']['name'];
    copy($_FILES['imagen']['tmp_name'],$path);
    
    $_SESSION['padre']->foto_path=$_FILES['imagen']['name'];
  }

  //VERIFICAR EL PASSWORD
  if(isset($_POST["password"]) && $_POST["password"] != ""){
      $sql="UPDATE `usuario` SET `PASSWORD`=:pass  WHERE `USUARIO`=:usu";
      $resultado=$base->prepare($sql);
      $resultado->execute(array(":pass"=>$_POST["password"],":usu"=>$_SESSION['padre']->usuario));
      $_SESSION['padre']->password=$_POST["password"];
  }
  //VERIFICAR EL TELEFONO
  if(isset($_POST["telefono"]) && $_POST["telefono"]!=""){
      $sql="UPDATE `padre` SET `TELEFONO`=:tel  WHERE `USUARIO`=:usu";
      $resultado=$base->prepare($sql);
      $resultado->execute(array(":tel"=>$_POST["telefono"],":usu"=>$_SESSION['padre']->usuario));
      $_SESSION['padre']->telefono=$_POST["telefono"];
  }

  //VERIFICAR EL GRADO
  if(isset($_POST["grado"]) && $_POST["grado"]!=""){
      $sql="UPDATE `padre` SET `ID_GRADO`=:gra  WHERE `USUARIO`=:usu";
      $resultado=$base->prepare($sql);
      $resultado->execute(array(":gra"=>$_POST["grado"],":usu"=>$_SESSION['padre']->usuario));
      $_SESSION['padre']->grado=$_POST["grado"];
  }
  //VERIFICAR EL CORREO
  if(isset($_POST["correo"]) && $_POST['correo']!=""){
      $sql="UPDATE `padre` SET `CORREO`=:cor  WHERE `USUARIO`=:usu";
      $resultado=$base->prepare($sql);
      $resultado->execute(array(":cor"=>$_POST["correo"],":usu"=>$_SESSION['padre']->usuario));
      $_SESSION['padre']->correo=$_POST["correo"];
  }

//VERIFICAR EL USUARIO
if(isset($_POST["usuario"]) && $_POST["usuario"]!=""){
    //verificar si existe el usuario ingresado
    $sql="SELECT `USUARIO` FROM `usuario` WHERE `USUARIO`=:usu";
    $resultado=$base->prepare($sql);
    $resultado->execute(array(":usu"=>$_POST["usuario"]));
    $numero_registro=$resultado->rowCount();
    if($numero_registro!=0)//si el usuario existe
    {
        $mensaje="El usuario ya existe ingrese otro usuario!!";
        header("location: perfil_padre.php?mensaje=$mensaje");
        exit();
    }

    //ACTUALIZAMOS EL USUARIO EN LA TABLA usuario
    $sql="UPDATE `usuario` SET `USUARIO`=:nUsu WHERE `USUARIO`=:usuario";
    $resultado=$base->prepare($sql);
    $resultado->execute(array(":nUsu"=>$_POST["usuario"],":usuario"=>$_SESSION['padre']->usuario));
    $_SESSION['padre']->usuario=$_POST["usuario"];
}

$mensaje="Tus Cambios han sido guardos";
header("location: perfil_padre.php?mensaje=$mensaje");
} catch (Exception $e) {
  echo "linea de error: " . $e->getLine()."<br>";
  die("Error: " . $e->getMessage());
  //echo $_POST['grado'];
  }
 ?>
