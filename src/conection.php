<?php
include("variables.php");
include("profesor/clase_usuario_profesor.php");
include("clase_archivo.php");
include("profesor/claseComunicado.php");
include("profesor/claseMateria.php");

class Conection{
  var $base;
  var $resultado;
    function Conection(){
      try {
        $this->base=new PDO("mysql:host=".Variables::$db_host. ";dbname=".Variables::$db_nombre, Variables::$db_usuario,Variables::$db_password);
        $this->base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->base->exec(Variables::$juego_caracteres);
      } catch (Exception $e) {
        die("Error Conection.php: " . $e->getMessage()."<br>linea de error: " . $e->getLine()."<br>");
      }
    }
    function selectVerificaUsuario($sql,$params){
      try {
        $this->resultado=$this->base->prepare($sql);
        $this->resultado->execute($params);
        return $this->resultado->rowCount();
      } catch (Exception $e) {
        die("Error Conection.php: " . $e->getMessage()."<br>linea de error: " . $e->getLine()."<br>");
      }
    }
    function selectLogin($sql,$params){
      try {
        $this->resultado=$this->base->prepare($sql);
        $usu=htmlentities(addslashes($params[0]));
        $password=htmlentities(addslashes($params[1]));
        $this->resultado->bindValue(":login",$usu);
        $this->resultado->bindValue(":password",$password);
        $this->resultado->execute();
        return $this->resultado->rowCount();
      } catch (Exception $e) {
        die("Error Conection.php: " . $e->getMessage()."<br>linea de error: " . $e->getLine()."<br>");
      }
    }

    function padreOProfe(){
      $registro=$this->resultado->fetch(PDO::FETCH_ASSOC);
      return $registro['TIPO'];
    }

    function getProfesor($sql,$params,$usuario,$password){
      $this->resultado=$this->base->prepare($sql);
      $this->resultado->execute($params);
      $registro=$this->resultado->fetch(PDO::FETCH_ASSOC);

      //Datos del profesor logeado
      $profesor=new Profesor($registro['CI_PROFESOR'],$registro['NOMBRES'],
      $registro['APELLIDOS'],$registro['TELEFONO'],$registro['CORREO'],
      $registro['FOTO_PATH'],$usuario,$password);
      return $profesor;
    }

    function getMaterias($sql,$params){
      $this->resultado=$this->base->prepare($sql);
      if($params=="")$this->resultado->execute();
      else $this->resultado->execute($params);
      for($i=0;$registro=$this->resultado->fetch(PDO::FETCH_ASSOC);$i++)
        $MisMaterias[$i]=new Materia($registro['ID_GRADO'],$registro['NOMBRE_MATERIA'],$registro['ID_MATERIA']);
      return $MisMaterias;
    }

    function getArchivos($sql,$params){
      $this->resultado=$this->base->prepare($sql);
      $this->resultado->execute($params);
      for($i=0;$registro=$this->resultado->fetch(PDO::FETCH_ASSOC);$i++)
        $MisArchivos[$i]=new Archivo($registro['NOMBRE_ARCHIVO'],"../files",$registro['NOMBRE_MATERIA'],$registro['NOMBRES'],$registro['COMENTARIO']);
      return $MisArchivos;
    }

    function getRegistro($sql,$params){
      $this->resultado=$this->base->prepare($sql);
      $this->resultado->execute($params);
      $registro=$this->resultado->fetch(PDO::FETCH_ASSOC);
      return  $registro;
    }

    function getRegistroFetch(){
      return $this->resultado->fetch(PDO::FETCH_ASSOC);
    }

    function afectaRegistro($sql,$params){
      $this->resultado=$this->base->prepare($sql);
      $this->resultado->execute($params);
    }
    function cierraConection(){
      $this->resultado->closeCursor();
    }
}
?>
