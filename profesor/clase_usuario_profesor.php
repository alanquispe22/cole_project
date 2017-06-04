<?php
class Profesor{

  var $nombres;
  var $apellidos;
  var $usuario;
  var $password;
  var $foto;
  var $id_profesor;
  var $id_usuario;

  function Profesor($nombres,$apellidos,$usuario,$password,$foto,$id_profesor,$id_usuario){
    $this->nombres=$nombres;
    $this->apellidos=$apellidos;
    $this->usuario=$usuario;
    $this->password=$password;
    $this->foto=$foto;
    $this->id_profesor=$id_profesor;
    $this->id_usuario=$id_usuario;
  }
  function mostrar(){
    echo $this->nombres."<br>";
    echo $this->apellidos."<br>";
    echo $this->usuario."<br>";
    echo $this->password."<br>";
    echo $this->foto."<br>";
    echo $this->id_profesor."<br>";
    echo $this->id_usuario."<br>";
  }
  function getIdProfesor(){
    return $this->id_profesor;
  }
}
 ?>
