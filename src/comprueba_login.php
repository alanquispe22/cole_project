<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      include("conection.php");//conexion a la BD
      $conection=new Conection();
      $sql="SELECT * FROM `usuario` WHERE USUARIO= :login AND PASSWORD= :password";
      $params[0]=$_POST["usu"];
      $params[1]=$_POST["password"];
      $numero_registro=$conection->selectLogin($sql,$params);
      if($numero_registro!=0)//si el usuario existe
      {
        session_start();
        $_SESSION["usuario"]=$_POST["usu"];
        $_SESSION["password"]=$_POST["password"];
        if($conection->padreOProfe()=="padre"){
          $conection->cierraConection();
          //Es un padre
          header("location: padre/obtiene_datos_padre_logeado.php");
        }else{
          $conection->cierraConection();
          //Es un profesor
          header("location: profesor/obtiene_datos_profesor_logeado.php");
        }
      }else{
          $conection->cierraConection();
          header("location:index.php");
      }
     ?>
  </body>
</html>
