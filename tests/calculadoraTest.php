<?php
use PHPUnit\Framework\TestCase;
//use Calculadora;

final class CalculadoraTest extends TestCase
{
  public function testSuma(){
    $calc=new Calculadora();
    $this->assertEquals(7,$calc->suma(3,4));
  }

  public function testMultiplica(){
    $calc=new Calculadora();
    $this->assertEquals(12,$calc->multiplica(3,4));
  }
}
 ?>
