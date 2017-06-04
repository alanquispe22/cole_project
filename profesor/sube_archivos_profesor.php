    <?php
$formatos = array('.xlsx','.xls','.pdf');
$directorio='archivos';
$contArchivos=0;
if (isset($_POST['boton'])) {
	$nombreArchivo = $_FILES['archivo']['name'];
	$nombreTmpArchivo = $_FILES['archivo']['tmp_name'];
	$ext = substr($nombreArchivo, strrpos($nombreArchivo, '.'));
	if (in_array($ext, $formatos)) {
		if (move_uploaded_file($nombreTmpArchivo, "archivos/$nombreArchivo")) {
			echo "archivo $nombreArchivo subido";
		}else{
			echo "ocurrio un error";
		}

	}else{
		echo "archivo no permitido";
	}
}
?>


<!DOCTYPE html>
<html lang="es">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
  <?php
  include("claseComunicado.php");
  include("claseMateria.php");
  include("clase_usuario_profesor.php");
  session_start();//reanudamos una session si es que la hay
  if(!isset($_SESSION["profesor"])){
    //redirigimos si no existe la session
    header("location:../index.php");
  }?>
  <?php
  require("nav_profesor.php");
   ?>
<div class="caja">
<form method="post" action="" enctype="multipart/form-data">
<h2 align="center" class="Estilo1">SUBIR ARCHIVO</h2>
<div align="center">
  <input type="file" name="archivo" />
  <br/>
    <input type="submit" value="Subir Archivo" name="boton" />
  <br/>
<?php
if ($dir=opendir($directorio))
{
	while ($archivo = readdir($dir))
	{
		if ($archivo!='.' && $archivo!='..')
		{
			$contArchivos++;
			echo "Archivo: <strong>$archivo</strong> <br/>";
		}
	}
	echo "total de archivos: <strong>$contArchivos</strong>";

}
?>
</div>
</form>
</div>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
