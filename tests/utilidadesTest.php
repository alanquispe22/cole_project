<?php
include("../src/utilidades.php");
use PHPUnit\Framework\TestCase;
final class UtilidadesTest extends TestCase
{
  public function testIgualArray(){
    $array[0]="maria";
    $array[1]="juan";

    $array1[0]="maria";
    $array1[1]="juan";
    $array1[2]="juan";


    $this->assertEquals(true,sonIgualesArrays($array,$array1));
  }
}
 ?>
