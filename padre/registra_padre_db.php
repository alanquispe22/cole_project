<?php
$usuario=$_POST["usuario"];
$password=$_POST["password"];
$nombres=$_POST["nombres"];
$apellidos=$_POST["apellidos"];
$telefono=$_POST["telefono"];
$grado=$_POST["grado"];
// Comprobamos si ha ocurrido un error con la imagen
if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
    echo "Ha ocurrido un error.";
    exit();
}
// Verificamos si el tipo de archivo es un tipo de imagen permitido.
// y que el tamaño del archivo no exceda los 16MB
$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
$limite_kb = 16384;
if (!in_array($_FILES['imagen']['type'], $permitidos) || !($_FILES['imagen']['size'] <= $limite_kb*1024)){
  echo "El archivo no es de un tipo permitido o es demasiado grande";
  exit();
}
// Archivo temporal
$imagen_temporal = $_FILES['imagen']['tmp_name'];
// Tipo de archivo
$tipo = $_FILES['imagen']['type'];
// Leemos el contenido del archivo temporal en binario.
$fp = fopen($imagen_temporal, 'r+b');
$data = fread($fp, filesize($imagen_temporal));
fclose($fp);
//Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
// $data=file_get_contents($imagen_temporal);
// Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
$data = mysql_escape_string($data);
// Insertamos en la base de datos.
//$resultado = @mysql_query("INSERT INTO imagenes (imagen, tipo_imagen) VALUES ('$data', '$tipo')");
try{
  $base=new PDO("mysql:host=localhost; dbname=colegio", "root","");
  $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $base->exec("SET CHARACTER SET utf8");
  //INSERTAMOS NUEVO PADRE EN LA TABLA USUARIO
  $sql="INSERT INTO `usuario`(`USUARIO`, `PASSWORD`, `TIPO`) VALUES (:usu,:pass,:tipo)";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":usu"=>$usuario,":pass"=>$password,":tipo"=>"padre"));
  //se obtiene id_usuario de la tabla usuario
  $sql="SELECT `ID_USUARIO` FROM `usuario` WHERE `USUARIO`=:usu";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":usu"=>$usuario));
  $registro=$resultado->fetch(PDO::FETCH_ASSOC);

  //INSERTAMOS NUEVO PADRE EN LA TABLA "padre"
  $sql="INSERT INTO `padre`(`NOMBRES`, `APELLIDOS`, `TELEFONO`, `FOTO`, `ID_USUARIO`, `TIPO_IMAGEN`,`GRADO_PADRE`)
  VALUES (:nom, :ape, :tel,:fot,:idu,:tim,:grad)";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":nom"=>$nombres,":ape"=>$apellidos,
        ":tel"=>$telefono,":fot"=>$data,":idu"=>$registro['ID_USUARIO'],":tim"=>$tipo,":grad"=>$grado));

  //OBTENEMOS EL ID DE ESTE NUEVO PADRE
  $sql="SELECT `ID_PADRE` FROM `padre` WHERE `NOMBRES`=:noms";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":noms"=>$nombres));
  $registro=$resultado->fetch(PDO::FETCH_ASSOC);
  $id_padre=$registro['ID_PADRE'];
  //DEPENDIENDO DEL GRADO DE LA PERSONA SE SELECCIONA LAS ID MATERIAS Q A ESTA LE INTERESAN
  $sql="SELECT `ID_MATERIA` FROM `materia` WHERE `GRADO_MATERIA`=:grado";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":grado"=>$grado));
  while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    //INSERTAMOS GRADO DE PADRE EN LA TABLA "padre_materia"
    $sql="INSERT INTO `padre_materia`(`ID_PADRE`, `ID_MATERIA`) VALUES (:idp,:idm)";
    $res=$base->prepare($sql);
    $res->execute(array(":idp"=>$id_padre,":idm"=>$registro['ID_MATERIA']));
  }
  $resultado->closeCursor();
  header("location: ../index.php");
} catch (Exception $e) {//$e es objeto y getMessage() es uno de sus metodos
  echo "linea de error: " . $e->getLine()."<br>";
  die("Error: " . $e->getMessage());
}
 ?>
