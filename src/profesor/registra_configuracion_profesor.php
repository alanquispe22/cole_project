<?php
include("../conection.php");
include("../utilidades.php");
session_start();//reanudamos una session si es que la hay
if(!isset($_SESSION["profesor"])){
  //redirigimos si no existe la session
  header("location:../index.php");
}

try{
  $conection=new Conection();

  //--------------------------VERIFICAMOS LAS MATERIAS---------------------------
  if(isset($_POST["materia"])){
    $id_materia=$_POST["materia"];
    $materias=$_SESSION['materias'];
    for ($i=0; $i < count($materias); $i++) {
        $materias_id[$i]=$materias[$i]->id_materia;
    }
    if(!sonIgualesArrays($id_materia,$materias_id)){
            //PRIMERO BORRAMOS LAS MATERIAS QUE YA ENSEÑA
            $sql="DELETE FROM `profesor_materia` WHERE `CI_PROFESOR`=:ci";
            $params=array(":ci"=>$_SESSION['profesor']->ci_profesor);
            $conection->afectaRegistro($sql,$params);

            //AHORA INSERTAMOS LAS NUEVAS MATERIAS
            $sql="INSERT INTO `profesor_materia`(`CI_PROFESOR`, `ID_MATERIA`) VALUES (:ci,:mat)";
            for($i=0;$i<count($id_materia);$i++){
            $params=array(":ci"=>$_SESSION['profesor']->ci_profesor,":mat"=>$id_materia[$i]);
            $conection->afectaRegistro($sql,$params);
            }
             //Actualizamos el vector $_SESSION de las materias
             $sql="SELECT m.ID_MATERIA,m.NOMBRE_MATERIA,m.ID_GRADO FROM `profesor_materia` as pm,`materia`
             as m WHERE pm.`CI_PROFESOR`=:idprof AND m.`ID_MATERIA`=pm.`ID_MATERIA`";
             $params=array(":idprof"=>$_SESSION["profesor"]->ci_profesor);
             $conection->afectaRegistro($sql,$params);
             for($i=0;$registro=$conection->getRegistroFetch();$i++)
               $MisMaterias[$i]=new Materia($registro['ID_GRADO'],$registro['NOMBRE_MATERIA'],$registro['ID_MATERIA']);
            $_SESSION["materias"]=$MisMaterias;
    }else{
      echo "No hay cambios en tus materias";
    }
  }else{
    $mensaje="Debes elegir alguna materia";
    header("location: perfil_profesor.php?mensaje=$mensaje");
    exit();
  }

  //------------------------VERIFICAR LA FOTO----------------------------
  if (isset($_FILES["imagen"]) &&  $_FILES["imagen"]["error"] == 0){
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;
    if (!in_array($_FILES['imagen']['type'], $permitidos) || !($_FILES['imagen']['size'] <= $limite_kb*1024)){
      echo "El archivo no es de un tipo permitido o es demasiado grande";
      exit();
    }
    $sql="UPDATE `profesor` SET `FOTO_PATH`=:fot  WHERE `USUARIO`=:usu";
    $params=array(":fot"=>$_FILES['imagen']['name'],":usu"=>$_SESSION['profesor']->usuario);
    $conection->afectaRegistro($sql,$params);
    $_SESSION['profesor']->foto_path=$_FILES['imagen']['name'];

    //ALMACENAMOS LA FOTO DE ESTE NUEVO PADRE
    $carpeta="../foto_perfil/";
    opendir($carpeta);
    //ALMACENAMOS UN ARCHIVO EN EL DIRECTORIO FILES
    $path=$carpeta.$_FILES['imagen']['name'];
    copy($_FILES['imagen']['tmp_name'],$path);
  }

  //--------------------VERIFICAR EL PASSWORD------------------
  if(isset($_POST["password"]) && $_POST["password"] != ""){
      $sql="UPDATE `usuario` SET `PASSWORD`=:pass  WHERE `USUARIO`=:usu";
      $params=array(":pass"=>$_POST["password"],":usu"=>$_SESSION['profesor']->usuario);
      $conection->afectaRegistro($sql,$params);
      $_SESSION['profesor']->password=$_POST["password"];
  }

  //---------------------VERIFICAR EL TELEFONO---------------------
  if(isset($_POST["telefono"]) && $_POST["telefono"]!=""){
      $sql="UPDATE `profesor` SET `TELEFONO`=:tel  WHERE `USUARIO`=:usu";
      $params=array(":tel"=>$_POST["telefono"],":usu"=>$_SESSION['profesor']->usuario);
      $conection->afectaRegistro($sql,$params);
      $_SESSION['profesor']->telefono=$_POST['telefono'];
  }

  //-----------------------VERIFICAR EL CORREO--------------------
  if(isset($_POST["correo"]) && $_POST['correo']!=""){
      $sql="UPDATE `profesor` SET `CORREO`=:cor  WHERE `USUARIO`=:usu";
      $params=array(":cor"=>$_POST["correo"],":usu"=>$_SESSION['profesor']->usuario);
      $conection->afectaRegistro($sql,$params);
      $_SESSION['profesor']->correo=$_POST['correo'];
  }

//--------------------------VERIFICAR EL USUARIO-----------------------
if(isset($_POST["usuario"]) && $_POST["usuario"]!=""){
    //verificar si existe el usuario ingresado
    $sql="SELECT `USUARIO` FROM `usuario` WHERE `USUARIO`=:usu AND PASSWORD= :password";
    $params=array(":usu"=>$_POST["usuario"],":password"=>$_SESSION['profesor']->password);
    $numero_registro=$conection->selectVerificaUsuario($sql,$params);
    if($numero_registro!=0)//si el usuario existe
    {
        $mensaje="El usuario ya existe ingrese otro usuario!!";
        header("location: perfil_profesor.php?mensaje=$mensaje");
        exit();
    }

    //ACTUALIZAMOS EL USUARIO EN LA TABLA usuario
    $sql="UPDATE `usuario` SET `USUARIO`=:nUsu WHERE `USUARIO`=:usuario";
    $params=array(":nUsu"=>$_POST["usuario"],":usuario"=>$_SESSION['profesor']->usuario);
    $conection->afectaRegistro($sql,$params);
    $_SESSION['profesor']->usuario=$_POST['usuario'];

}

$mensaje="Tus Cambios han sido guardos";
header("location: perfil_profesor.php?mensaje=$mensaje");
} catch (Exception $e) {
  echo "linea de error: " . $e->getLine()."<br>";
  die("Error: " . $e->getMessage());
  //echo $_POST['grado'];
  }
 ?>
