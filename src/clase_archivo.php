<?php
class Archivo{
  var $nombre;
  var $ruta;
  var $materia;
  var $profesor;//nombres del profesor
  var $comentario;

  function Archivo($nombre,$ruta,$materia,$profesor, $comentario){
   $this->nombre=$nombre;
   $this->ruta=$ruta;
   $this->materia=$materia;
   $this->profesor=$profesor;
   $this->comentario=$comentario;
  }

  function mostrar(){
    echo $this->nombre."<br>";
    echo $this->ruta."<br>";
    echo $this->materia."<br>";
    echo $this->profesor."<br>";
    echo $this->comentario."<br>";
  }

}
 ?>
