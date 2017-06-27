<?php
  session_start();
  if(!isset($_SESSION['usuario']))
    header("location: ../index.php");
  include("../conection.php");
  try{
  $conection=new Conection();

    //------------OBTENCION DEL PROFESOR ----------------
  $sql="SELECT * FROM `profesor` WHERE `USUARIO`= :id";
  $params=array(":id"=>$_SESSION["usuario"]);
  $_SESSION['profesor']=$conection->getProfesor($sql,$params,$_SESSION['usuario'],$_SESSION['password']);

   //----------------OBTENIENDO datos MATERIAS------------------
   $sql="SELECT m.NOMBRE_MATERIA,m.ID_GRADO,m.ID_MATERIA FROM `profesor_materia` as pm,`materia`
   as m WHERE pm.`CI_PROFESOR`=:idprof AND m.`ID_MATERIA`=pm.`ID_MATERIA`";
   $params=array(":idprof"=>$_SESSION["profesor"]->ci_profesor);
   $_SESSION["materias"]=$conection->getMaterias($sql,$params);

  //-----------OBTENIENDO RUTAS DE ARCHIVOS-----------------
  $sql="SELECT `NOMBRE_ARCHIVO`, `NOMBRE_MATERIA`,`NOMBRES`, `COMENTARIO` FROM `archivo` inner join `materia`
  on archivo.ID_MATERIA=materia.ID_MATERIA inner join  `profesor` on profesor.CI_PROFESOR=archivo.CI_PROFESOR
  WHERE archivo.CI_PROFESOR=:profe";
  $params=array(":profe"=>($_SESSION["profesor"]->ci_profesor));
  $_SESSION["archivos"]=$conection->getArchivos($sql,$params);
  $conection->cierraConection();
  header("location: sector_profesor_comunicados.php");
  } catch (Exception $e) {
   echo "linea de error: " . $e->getLine()."<br>";
   die("Error: " . $e->getMessage());
   }
?>
