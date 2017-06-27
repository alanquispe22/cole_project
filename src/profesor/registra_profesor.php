<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro nuevo profesor</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="stylesheet" href="../micss/one-page-wonder.css" media="screen"> -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../micss/multiselect.css">
    </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
       <div class="container">
         <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="#">QR Consultory</a>
         </div>
         <div id="navbar" class="navbar-collapse collapse">
           <form action="../comprueba_login.php" method="post" class="navbar-form navbar-right">
             <div class="form-group">
               <input type="text" name="usu" placeholder="Usuario" class="form-control">
             </div>
             <div class="form-group">
               <input type="password" name="password" placeholder="Contraseña" class="form-control">
             </div>
             <button type="submit" class="btn btn-success">Ingresar</button>
              <a id="nuevo" href="../index.php" class="btn btn-primary ">Volver</a>
           </form>
         </div><!--/.navbar-collapse -->
       </div>
     </nav><br><br>
     <?php
    if(isset($_GET['mensaje'])){
      echo "<h1>".$_GET['mensaje']."</h1>";
    }
     ?>
  <div class="container">
        <div class="featurette" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"><br><br><br>
                        <form action="registra_profesor_db.php" method="post" enctype="multipart/form-data">
                            <h2>PROFESOR  <small>Un servicio hecho para usted</small></h2>
                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nombres" class="form-control input-lg" placeholder="Nombres" required="on">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="apellidos" class="form-control input-lg" placeholder="Apellidos" required="on">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="ci" class="form-control input-lg" placeholder="Cedula de identidad" required="on">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="correo" class="form-control input-lg" placeholder="Correo Electronico">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="telefono" class="form-control input-lg" placeholder="Telefono o Celular" required="on">
                            </div><br>
                            <div class="form-group">
                                <input type="text" name="usuario" class="form-control input-lg" placeholder="Usuario" required="on">
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Contraseña" required="on">
                                    </div>
                                    <span id="mensaje"></span>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="confirmacion" id="confirmacion" class="form-control input-lg" placeholder="Confirmación" required="on">
                                    </div>
                                      <span id="mensajeConf"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12"><h3><small>MATERIAS QUE ENSEÑA: </small></h3>
                                  <?php
                                  include("../variables.php");
                                  try {
                                    $base=new PDO("mysql:host=".Variables::$db_host. ";dbname=".Variables::$db_nombre, Variables::$db_usuario,Variables::$db_password);
                                    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                    $base->exec(Variables::$juego_caracteres);
                                    $sql="SELECT `ID_MATERIA`,`NOMBRE_MATERIA`, `ID_GRADO` FROM `materia` WHERE 1";
                                    $resultado=$base->prepare($sql);
                                    $resultado->execute();?>
                                    <select id='pre-selected-options' multiple='multiple' name="materia[]">
                                    <?php while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                                      $materia_grado=$registro['NOMBRE_MATERIA']." ".$registro['ID_GRADO'];
                                      $id_materia=$registro['ID_MATERIA'] ?>
                                        <option value='<?php echo $id_materia; ?>'><?php echo $materia_grado; ?></option>
                                    <?php  }
                                      $resultado->closeCursor();
                                  } catch (Exception $e) {
                                    echo "linea de error: " . $e->getLine()."<br>";
                                    die("Error: " . $e->getMessage());
                                  }
                                   ?>
                                </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                  <h3><small>Elija una foto para su perfil: </small></h3>
                                  <input type="file" name="imagen" id="imagen" required="on"/>
                                </div>
                            </div>
                            <hr class="colorgraph">
                            <div class="row">
                              <div class="col-xs-12 col-md-6">
                                 <a href="../index.php" class="btn btn-primary btn-block btn-lg">Cancelar</a>
                               </div>
                               <div class="col-xs-12 col-md-6">
                                  <input type="submit" value="Registrarme" class="btn btn-primary btn-block btn-lg">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    <script src="../js/jquery.js"></script>
    <script src="../mijs/valida_formulario.js"></script><!--Primero  el script de jquery luego recien nuestros scripts-->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../mijs/jquery.multiselect.js"></script>
    <script type="text/javascript">
    // run pre selected options
    $('#pre-selected-options').multiSelect({ keepOrder: true });
    //$('#keep-order').multiSelect({ keepOrder: true });
    </script>
  </body>
</html>
