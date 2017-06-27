<?php
include("../variables.php");
$usuario=$_POST["usuario"];
$password=$_POST["password"];
$nombres=$_POST["nombres"];
$apellidos=$_POST["apellidos"];
$telefono=$_POST["telefono"];
$correo=$_POST["correo"];
$ci=$_POST["ci"];
$id_materia=$_POST["materia"];
// Comprobamos si ha ocurrido un error con la imagen
if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
    echo "Ha ocurrido un error con la imagen";
    exit();
}
$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
$limite_kb = 16384;
if (!in_array($_FILES['imagen']['type'], $permitidos) || !($_FILES['imagen']['size'] <= $limite_kb*1024)){
  echo "El archivo no es de un tipo permitido o es demasiado grande";
  exit();
}

 try{
 $base=new PDO("mysql:host=".Variables::$db_host. ";dbname=".Variables::$db_nombre, Variables::$db_usuario,Variables::$db_password);
  $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $base->exec(Variables::$juego_caracteres);

  //AVERIGUAMOS SI EL USUARIO NO EXISTE
  $sql="SELECT `USUARIO` FROM `usuario` WHERE `USUARIO`=:usu";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":usu"=>$usuario));
  $numero_registro=$resultado->rowCount();
  if($numero_registro!=0)//si el usuario existe
  {
      $mensaje="El usuario ya existe ingrese otro usuario!!";
      header("location: registra_profesor.php?mensaje=$mensaje");
      exit();
  }

  //INSERTAMOS NUEVO PROFESOR EN LA TABLA USUARIO
  $sql="INSERT INTO `usuario`(`USUARIO`, `PASSWORD`, `TIPO`) VALUES (:usu,:pass,:tipo)";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":usu"=>$usuario,":pass"=>$password,":tipo"=>"profesor"));

  //INSERTAMOS NUEVO PROFESOR EN LA TABLA "PROFESOR"
  $sql="INSERT INTO `profesor`(`CI_PROFESOR`,`NOMBRES`, `APELLIDOS`, `TELEFONO`, `CORREO`, `FOTO_PATH`, `USUARIO`)
  VALUES (:ci,:nom, :ape, :tel,:correo,:fot,:usu)";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":ci"=>$ci,":nom"=>$nombres,":ape"=>$apellidos,
        ":tel"=>$telefono,":correo"=>$correo,":fot"=>$_FILES['imagen']['name'],":usu"=>$usuario));

  //INSERTAMOS LAS MATERIAS QUE ENSEÑA ESTE PROFESOR
  $sql="INSERT INTO `profesor_materia`(`CI_PROFESOR`, `ID_MATERIA`) VALUES (:ci,:mat)";
  $resultado=$base->prepare($sql);
  for($i=0;$i<count($id_materia);$i++){
  $resultado->execute(array(":ci"=>$ci,":mat"=>$id_materia[$i]));
  }

  $resultado->closeCursor();

  //ALMACENAMOS LA FOTO DE ESTE NUEVO PADRE
  opendir(Variables::$ruta_foto_perfil_profesor);

  //ALMACENAMOS UN ARCHIVO EN EL DIRECTORIO FILES
  $path=Variables::$ruta_foto_perfil_profesor.$_FILES['imagen']['name'];
  copy($_FILES['imagen']['tmp_name'],$path);
  header("location: ../index.php");
} catch (Exception $e) {
  echo "linea de error: " . $e->getLine()."<br>";
  die("Error: " . $e->getMessage());
}
 ?>
