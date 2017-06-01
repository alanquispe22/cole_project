<?php
$comunicado=$_POST["comunicado"];

try{
  $base=new PDO("mysql:host=localhost; dbname=colegio", "root","");
  $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $base->exec("SET CHARACTER SET utf8");
  $sql="INSERT INTO `comunicado` ( `MENSAJE`)
  VALUES (:men)";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":men"=>$comunicado));
  $resultado->closeCursor();
 header("location:sector_profesor.php");
} catch (Exception $e) {//$e es objeto y getMessage() es uno de sus metodos
  die("Error: " . $e->getMessage());
  //echo "linea de error: " . $e->getLine();
}
?>
