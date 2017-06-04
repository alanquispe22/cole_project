<?php
  session_start();
  if(!isset($_SESSION['usuario']))
    header("location: ../index.php");
  include("claseComunicado.php");
  include("claseMateria.php");
  include("clase_usuario_profesor.php");
  try{
  $base=new PDO("mysql:host=localhost; dbname=colegio", "root","");
  $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $base->exec("SET CHARACTER SET utf8");
  $sql="SELECT * FROM PROFESOR WHERE ID_USUARIO= :id";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":id"=>$_SESSION["id_usuario"]));
  $registro=$resultado->fetch(PDO::FETCH_ASSOC);
  //Datos del profesor logeado
  $profesor=new Profesor($registro['NOMBRES'],$registro['APELLIDOS'],$_SESSION['usuario'],$_SESSION['password'],null,$registro['ID_PROFESOR'],$_SESSION['id_usuario']);
  unset($_SESSION['usuario']);
  unset($_SESSION['password']);
  unset($_SESSION['id_usuario']);
  $_SESSION['profesor']=$profesor;

   //obteniendo comunicados del profesor
   $sql="SELECT * FROM COMUNICADO WHERE ID_PROFESOR=:id";
   $resultado=$base->prepare($sql);
   $resultado->execute(array(":id"=>$_SESSION['profesor']->getIdProfesor()));
   for($i=0;$registro=$resultado->fetch(PDO::FETCH_ASSOC);$i++)
     $MisComunicados[$i]=new Comunicado($_SESSION["profesor"]->nombres." ".$_SESSION["profesor"]->apellidos,$registro['FECHA'],$registro['MENSAJE']);
   $_SESSION["comunicados"]=$MisComunicados;

   //Datos de las Materias que enseña
   $sql="SELECT m.NOMBRE_MATERIA,m.GRADO_MATERIA FROM `profesor_materia` as pm,`materia`
   as m WHERE pm.`id_profesor`=:idprof AND m.`id_materia`=pm.`id_materia`";
   $resultado=$base->prepare($sql);
   $resultado->execute(array(":idprof"=>$_SESSION["profesor"]->id_profesor));
   for($i=0;$registro=$resultado->fetch(PDO::FETCH_ASSOC);$i++)
     $MisMaterias[$i]=new Materia($registro['GRADO_MATERIA'],$registro['NOMBRE_MATERIA']);
  $_SESSION["materias"]=$MisMaterias;
   $resultado->closeCursor();
   } catch (Exception $e) {
     die("Error: " . $e->getMessage());
   }
   header("location: sector_profesor.php");
?>
