<?php
class Comunicado{
  var $autor;
  var $foto;
  var $fecha;
  var $comunicado;
  function Comunicado($autor,$fecha,$comunicado){
   $this->autor=$autor;
   $this->fecha=$fecha;
   $this->comunicado=$comunicado;
  }
  function mostrar(){
    echo $this->autor."<br>";
    echo $this->fecha."<br>";
    echo $this->comunicado."<br>";
  }

}
 ?>
