<?php
class Padre{

  var $ci_padre;
  var $nombres;
  var $apellidos;
  var $telefono;
  var $correo;
  var $foto_path;
  var $usuario;
  var $password;
  var $id_grado;

  function Padre($ci_padre,$nombres,$apellidos,$telefono,$correo,$foto_path,$usuario,$password,$id_grado){
    $this->ci_padre=$ci_padre;
    $this->nombres=$nombres;
    $this->apellidos=$apellidos;
    $this->telefono=$telefono;
    $this->correo=$correo;
    $this->foto_path=$foto_path;
    $this->usuario=$usuario;
    $this->password=$password;
    $this->id_grado=$id_grado;
  }

  function mostrar(){
    echo "Este es el padre: <br>";
    echo "Nombres: ".$this->nombres."<br>";
    echo "Apellidos: ".$this->apellidos."<br>";
    echo "Usuario: ".$this->usuario."<br>";
    echo "Password: ".$this->password."<br>";
    echo "Foto: ".$this->foto_path."<br>";
    echo "grado: ".$this->id_grado."<br>";
  }
}
 ?>
