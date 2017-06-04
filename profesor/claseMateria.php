<?php
class Materia{
  var $grado_materia;
  var $nombre_materia;

  function Materia($grado,$nombre){
    $this->grado_materia=$grado;
    $this->nombre_materia=$nombre;
  }
  function mostrar(){
    echo $this->grado_materia;
    echo $this->nombre_materia;
  }
  function getMateria(){
    return $this->nombre_materia;
  }
}
 ?>
