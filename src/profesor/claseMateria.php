<?php
class Materia{
  var $grado_materia;
  var $nombre_materia;
  var $id_materia;

  function Materia($grado,$nombre,$id_materia){
    $this->grado_materia=$grado;
    $this->nombre_materia=$nombre;
    $this->id_materia=$id_materia;
  }
  function mostrar(){
    echo $this->grado_materia;
    echo $this->nombre_materia;
    echo $this->id_materia;
  }
  function getMateria(){
    return $this->nombre_materia;
  }
  function getGradoMateria(){
    return $this->grado_materia;
  }
}
 ?>
