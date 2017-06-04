<?php
class Padre{

  var $nombres;
  var $apellidos;
  var $usuario;
  var $password;
  var $foto;
  var $id_padre;
  var $id_usuario;
  var $grado;
  var $tipo;
  function Padre($nombres,$apellidos,$usuario,$password,$foto,$id_padre,$id_usuario,$grado,$tipo){
    $this->nombres=$nombres;
    $this->apellidos=$apellidos;
    $this->usuario=$usuario;
    $this->password=$password;
    $this->foto=$foto;
    $this->id_padre=$id_padre;
    $this->id_usuario=$id_usuario;
    $this->grado=$grado;
    $this->tipo=$tipo;
  }

  function mostrar(){
    echo "Este es el padre: <br>";
    echo "Nombres: ".$this->nombres."<br>";
    echo "Apellidos: ".$this->apellidos."<br>";
    echo "Usuario: ".$this->usuario."<br>";
    echo "Password: ".$this->password."<br>";
    echo "Foto: ".$this->foto."<br>";
    echo "id_padre: ".$this->id_padre."<br>";
    echo "id_usuario: ".$this->id_usuario."<br>";
    echo "grado: ".$this->grado."<br>";
  }

  function getIdProfesor(){
    return $this->id_profesor;
  }
}
 ?>
