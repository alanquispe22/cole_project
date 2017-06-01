<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    session_start();//es importante para reanudar una sesion
    session_destroy();
    header("location:login_profesor.php");
     ?>
  </body>
</html>
