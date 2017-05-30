<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    session_start();//reanudamos una session si es que la hay
    if(!isset($_SESSION["usuario"])){
      //redirigimos si no existe la session
      header("location:index.php");
    }
     ?>
    <h2>Hola padre <?php echo $_SESSION["usuario"] ?>!!</h2>

  </body>
</html>
