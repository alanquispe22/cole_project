<?php
class Comunicado{
  var $autor;//nombre del autor
  var $foto_path;//foto del autor
  var $fecha;//fecha de publicacion de comunicado
  var $comunicado;
  var $materia;//materia y grado
  function Comunicado($autor,$foto_path,$fecha,$comunicado,$materia){
   $this->autor=$autor;
   $this->fecha=$fecha;
   $this->comunicado=$comunicado;
   $this->materia=$materia;
   $this->foto_path=$foto_path;
  }
  function mostrar(){
    echo $this->autor."<br>";
    echo $this->fecha."<br>";
    echo $this->comunicado."<br>";
  }

}
 ?>
