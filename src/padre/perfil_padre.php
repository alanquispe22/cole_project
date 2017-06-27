<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../micss/dashboard.css" rel="stylesheet">
    <style>
    #sha{
      -webkit-box-shadow:0px 0px 18px 0px rgba(48,50,50,0.48);
      moz-box-shadow:    0px 0px 18px 0px rgba(48,50,50,0.48);
      box-shadow:        0px 0px 18px 0px rgba(48,50,50,0.48);
    }
    </style>
  </head>
  <body>
    <?php
    include("../variables.php");
    include("clase_usuario_padre.php");
    session_start();//reanudamos una session si es que la hay
    if(!isset($_SESSION["padre"])){
      //redirigimos si no existe la session
      header("location:../index.php");
    }
    require("nav_padre.php");

     ?>
     <div class="container">
       <div class="row">
         <div class="col-sm-3 col-md-3 col-lg-2 sidebar">
           <ul class="nav nav-sidebar">
             <li class="active"><a href="perfil_padre.php">Configuracion Basica</a></li>
           </ul>
         </div>
         <div class="col-sm-9  col-md-9 main">
           <div class="container">
             <div class="row">
              <div class="col-xs-12 col-sm-8 col-sm-offset-3 col-md-8 col-md-offset-3 col-lg-8 col-lg-offset-2">
               <form action="registra_configuracion_padre.php" method="post" enctype="multipart/form-data">
                 <h2>PADRE  <small>Datos personales</small></h2>
                 <div class="row">
                     <div class="col-xs-6 col-sm-3 col-md-3">
                       <div class="form-group"><h3><small>NOMBRES:</small></h3>
                         <input type="text" name="nombres" placeholder="<?php echo $_SESSION['padre']->nombres; ?>" class="form-control input-lg" disabled="on">
                       </div>
                      </div>
                      <div class="col-xs-6 col-sm-3 col-md-3">
                        <div class="form-group"><h3><small>APELLIDOS:</small></h3>
                          <input type="text" name="apellidos" placeholder="<?php echo $_SESSION['padre']->apellidos; ?>" class="form-control input-lg" disabled="on">
                        </div>
                       </div>
                       <div class="col-xs-6 col-sm-3 col-md-3">
                          <div class="form-group"><h3><small>CEDULA:</small></h3>
                            <input type="text" placeholder="<?php echo $_SESSION['padre']->ci_padre; ?>" name="ci" class="form-control input-lg" disabled="on">
                          </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                          <div class="form-group"><h3><small>CORREO:</small></h3>
                            <input type="text" placeholder="<?php echo $_SESSION['padre']->correo; ?>" name="correo" class="form-control input-lg" >
                          </div>
                        </div>
                  </div>
                  <div class="row">
                     <div class="col-xs-6 col-sm-3 col-md-3">
                         <div class="form-group"><h3><small>TELEFONO: </small></h3>
                           <input type="text" name="telefono"  class="form-control input-lg" placeholder="<?php echo $_SESSION['padre']->telefono; ?>">
                         </div>
                     </div>
                     <div class="col-xs-6 col-sm-3 col-md-3">
                         <div class="form-group"><h3><small>GRADO: </small></h3>
                           <input type="text" name="grado" placeholder="<?php echo $_SESSION['padre']->id_grado; ?>" class="form-control input-lg" >
                         </div>
                     </div>
                     <div class="col-xs-6 col-sm-3 col-md-3">
                         <div class="form-group">
                           <img id="sha" src="<?php echo Variables::$ruta_foto_perfil_padre.$_SESSION['padre']->foto_path; ?>"  width="150" />
                         </div>
                     </div>
                     <div class="col-xs-6 col-sm-3 col-md-3">
                         <div class="form-group"><h3><small>FOTO PERFIL: </small></h3>
                            <input type="file" name="imagen" id="imagen"/>
                         </div>
                     </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-6 col-sm-4 col-md-4">
                          <div class="form-group"><h3><small>USUARIO: </small></h3>
                            <input type="text" name="usuario"  class="form-control input-lg" placeholder="<?php echo $_SESSION['padre']->usuario; ?>">
                          </div>
                      </div>
                       <div class="col-xs-6 col-sm-4 col-md-4">
                         <div class="form-group"><h3><small>CONTRASEÑA: </small></h3>
                           <input type="password" name="password" id="password"  class="form-control input-lg" placeholder="confirmación">
                         </div>
                         <span id="mensaje"></span>
                       </div>
                       <div class="col-xs-6 col-sm-4 col-md-4">
                         <div class="form-group"><h3><small>CONFIRMACION: </small></h3>
                           <input type="password" name="confirmacion" id="confirmacion" class="form-control input-lg" placeholder="nuevo password">
                         </div>
                        <span id="mensajeConf"></span>
                       </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-md-6">
                           <a href="sector_padre_comunicados.php" class="btn btn-primary btn-block btn-lg">Cancelar</a>
                         </div>
                         <div class="col-xs-12 col-md-6">
                            <input type="submit" value="Guardar cambios" class="btn btn-primary btn-block btn-lg">
                          </div>
                      </div>
                     </form>
                        <?php
                           if(isset($_GET['mensaje'])){
                           echo "<h1>".$_GET['mensaje']."</h1>";
                         } ?>
                 </div>
             </div>
           </div>
         </div>
       </div>
     </div>
    <script src="../js/jquery.js"></script>
    <script src="../mijs/valida_formulario.js"></script><!--Primero debe ponerse el script de jquery-->
   <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
