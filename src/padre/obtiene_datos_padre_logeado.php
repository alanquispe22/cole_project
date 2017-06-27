<?php
  session_start();
  if(!isset($_SESSION['usuario']))
    header("location: ../index.php");
  include("clase_usuario_padre.php");
  include("../clase_archivo.php");
  include("../variables.php");
  $path="../foto_perfil/";
  try{
  $base=new PDO("mysql:host=".Variables::$db_host. ";dbname=".Variables::$db_nombre, Variables::$db_usuario,Variables::$db_password);
  $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $base->exec(Variables::$juego_caracteres);

  $sql="SELECT * FROM padre WHERE USUARIO= :usu";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":usu"=>$_SESSION["usuario"]));
  $registro=$resultado->fetch(PDO::FETCH_ASSOC);
  $padre=new Padre($registro['CI_PADRE'],$registro['NOMBRES'],$registro['APELLIDOS'],$registro['TELEFONO'],$registro['CORREO'],$registro['FOTO_PATH'],$_SESSION['usuario'],$_SESSION['password'],$registro['ID_GRADO']);
  unset($_SESSION['usuario']);
  unset($_SESSION['password']);
  $_SESSION['padre']=$padre;

  $sql="SELECT `NOMBRE_ARCHIVO`, `NOMBRE_MATERIA`,`NOMBRES`, `COMENTARIO`, `ID_GRADO`
  FROM `archivo` inner join `materia`
  on archivo.ID_MATERIA=materia.ID_MATERIA
  inner join  `profesor` on profesor.CI_PROFESOR=archivo.CI_PROFESOR
  WHERE materia.ID_GRADO=:grado";

  $resultado=$base->prepare($sql);
  $resultado->execute(array(":grado"=>($_SESSION["padre"]->id_grado)));

  for($i=0;$registro=$resultado->fetch(PDO::FETCH_ASSOC);$i++){
    $MisArchivos[$i]=new Archivo($registro['NOMBRE_ARCHIVO'],"../files",$registro['NOMBRE_MATERIA'],$registro['NOMBRES'],$registro['COMENTARIO']);
  }

   $_SESSION["archivos"]=$MisArchivos;
  $resultado->closeCursor();
  header("location: sector_padre_comunicados.php");
  } catch (Exception $e) {
     echo "linea de error: " . $e->getLine()."<br>";
   die("Error: " . $e->getMessage());
  }
?>
