<?php
if (!isset($_GET['archivo']) || empty($_GET['archivo'])) {
   exit();
}
//Utilizamos basename por seguridad, devuelve el
//nombre del archivo eliminando cualquier ruta q tuviera este nombre
$archivo = basename($_GET['archivo']);
$ruta = 'files/'.$archivo;

if (is_file($ruta))
{
   header('Content-Type: application/force-download');
   header('Content-Disposition: attachment; filename='.$archivo);
   header('Content-Transfer-Encoding: binary');
   header('Content-Length: '.filesize($ruta));
   readfile($ruta);
}
else
   exit();
?>
