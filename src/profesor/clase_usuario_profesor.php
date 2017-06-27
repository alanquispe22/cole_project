<?php
class Profesor{
  var $ci_profesor;
  var $nombres;
  var $apellidos;
  var $telefono;
  var $correo;
  var $foto_path;
  var $usuario;
  var $password;

  function Profesor($ci_profesor,$nombres,$apellidos,$telefono,$correo,$foto_path,$usuario,$password){
    $this->ci_profesor=$ci_profesor;
    $this->nombres=$nombres;
    $this->apellidos=$apellidos;
    $this->telefono=$telefono;
    $this->correo=$correo;
    $this->foto_path=$foto_path;
    $this->usuario=$usuario;
    $this->password=$password;
  }

  function mostrar(){
    echo $this->ci_profesor."<br>";
    echo $this->nombres."<br>";
    echo $this->apellidos."<br>";
    echo $this->telefono."<br>";
    echo $this->correo."<br>";
    echo $this->foto_path."<br>";
    echo $this->usuario."<br>";
    echo $this->password."<br>";
  }

  function getCiProfesor(){
    return $this->ci_profesor;
  }
}
 ?>
