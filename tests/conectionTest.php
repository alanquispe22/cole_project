<?php
use PHPUnit\Framework\TestCase;

final class conectionTest extends TestCase
{
  public function testSelectLogin(){
    $conection=new Conection();
    $sql="SELECT * FROM USUARIO WHERE USUARIO= :login AND PASSWORD= :password";
    $params[0]="santos";
    $params[1]="santos123";
    $this->assertEquals(1,$conection->selectLogin($sql,$params));
  }

  /**
  *@dataProvider proveedorProfesor
  */
  public function testGetProfesor($usuario,$password,$esperado){
    $sql="SELECT * FROM PROFESOR WHERE `USUARIO`= :id";
    $params=array(":id"=>$usuario);
    $conection=new Conection();//realiza la conexion a la BD
    $this->assertEquals($esperado,$conection->getProfesor($sql,$params,$usuario,$password));
  }

  //funcion que provee de datos a  testGetProfesor
  public function proveedorProfesor(){
    return [
      'profesor1'=>["santos","santos123",new Profesor("654987","Santos","Casas","7535416",
      "santos_gasas@gmail.com","imgg.jpg","santos","santos123")],

      'profesor2'=>["juan","juan123",new Profesor("225367","Juan","Poma","784546123",
      "juan@gmail.com","ajax.jpg","juan","juan123")],

      'profesor3'=>["miki","miguelito123",new Profesor("953749","Miguel","Maria Ortiz",
      "2246878","miguelito_2018@hotmail.com","puma.jpg","miki","miguelito123")],

      'profesor4'=>["santosa","santos123",new Profesor("654987","Santos","Casas",
      "7535416","santos_gasas@gmail.com","url","user","santos123")]
    ];
  }
}
?>
