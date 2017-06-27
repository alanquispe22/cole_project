<?php
class Comunicado{
  var $autor;//autor del comunicado
  var $fecha;//fecha de publicacion de comunicado
  var $comunicado;
  var $materia;//materia y grado
  function Comunicado($autor,$fecha,$comunicado,$materia){
   $this->autor=$autor;
   $this->fecha=$fecha;
   $this->comunicado=$comunicado;
   $this->materia=$materia;
  }
  function mostrar(){
    echo $this->autor."<br>";
    echo $this->fecha."<br>";
    echo $this->comunicado."<br>";
  }

}
 ?>
