<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    try{
      //instanciamos la clase PDO, creamos la CONEXION
      $base=new PDO("mysql:host=localhost; dbname=colegio", "root","");

      //creamos objetos de tipo exception esto le sirve a la bd para q informe al catch
      //de cualquier error
      $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      //le especificamos el juego de caracteres con acento
      $base->exec("SET CHARACTER SET utf8");
      //Consulta preparada usando marcadores, :login es un marcador
      $sql="SELECT * FROM USUARIO WHERE USUARIO= :login AND PASSWORD= :password";

      //obtenemos el objeto "PDOStatement" en la variable $resultado
      $resultado=$base->prepare($sql);
      //este objeto "PDOStatement" primero hay q ejecutarlo y luego
      //hay q recorrer este resultado, ya q $resultado es una especie de tabla con los resultados
      //de la consulta

      //obtenemos los datos ingresados en el login evitando inyecciones
      $usu=htmlentities(addslashes($_POST["usu"]));
      $password=htmlentities(addslashes($_POST["password"]));

      /*execute y fetch
      Sin marcadores $resultado->execute(array($usu,$password));
      Con marcadores $resultado->execute(array(":login"=>$usu, ":password"=>$password));
      while($registro=$resultado->fetch(PDF::FETCH_ASSOC)){
        echo $registro['campo1'];
        echo $registro['campo1'];...
      }
      //liberando memoria
      $resultado->closeCursor();
      */

      //Vinculamos los datos del login a la consulta SQL
      $resultado->bindValue(":login",$usu);
      $resultado->bindValue(":password",$password);
      $resultado->execute();
      $numero_registro=$resultado->rowCount();
      if($numero_registro!=0)//si el usuario existe
      {
        session_start();
        $_SESSION["usuario"]=$_POST["usu"];
        $_SESSION["password"]=$_POST["password"];
        $registro=$resultado->fetch(PDO::FETCH_ASSOC);
        $_SESSION["id_usuario"]=$registro['ID_USUARIO'];
        if($registro['TIPO']=="padre"){
          //Es un padre
          header("location: padre/obtiene_datos_padre_logeado.php");
        }else{
          //Es una madre
          header("location: profesor/obtiene_datos_profesor_logeado.php");
        }
      }else{
        header("location:index.php");
      }
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
     ?>
  </body>
</html>
