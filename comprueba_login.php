<?php
/*
ESTA PAGINA NO MUESTRA NADA LO UNICO QUE HACE ES VERIFICAR SI LOS DATOS INGRESADOS EN EL LOGIN
SON VALIDOS, PARA ESTO REVISA EN LA BASE DE DATOS.
DE NO  SER VALIDO MANDA NUEVAMENTE AL index.php de lo contrario verifica si es padre o profesor
y dependiendo de eso manda a una pagina.
*/
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    try{
      //instanciamos la clase PDO
      $base=new PDO("mysql:host=localhost; dbname=colegio", "root","");
      $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql="SELECT * FROM USUARIOS_PASS WHERE USUARIOS= :login AND PASSWORD= :password";
      $resultado=$base->prepare($sql);
      //para evitar inyecciones:
      $usu=htmlentities(addslashes($_POST["usu"]));
      $password=htmlentities(addslashes($_POST["password"]));

      //si coincide
      $resultado->bindValue(":login",$usu);
      $resultado->bindValue(":password",$password);
      $resultado->execute();
      $numero_registro=$resultado->rowCount();
      if($numero_registro!=0)//si el usuario existe
      {
        session_start();
        $_SESSION["usuario"]=$_POST["usu"];

        //validamos si es profesor o padre

        //header("location: sector_padre.php");
      }else{
        //le redirigimos a la propia pagina web
        header("location:index.php");
      }
    } catch (Exception $e) {//$e es objeto y getMessage() es uno de sus metodos
      die("Error: " . $e->getMessage());
    }
     ?>
  </body>
</html>
