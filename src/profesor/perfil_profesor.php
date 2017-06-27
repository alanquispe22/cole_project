<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../micss/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../micss/multiselect.css">
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
    include("../conection.php");
    session_start();//reanudamos una session si es que la hay
    if(!isset($_SESSION["profesor"])){
      //redirigimos si no existe la session
      header("location:../index.php");
    }
    require("nav_profesor.php");
     ?>
     <div class="container">
       <div class="row">
         <div class="col-sm-3 col-md-3 col-lg-2 sidebar">
           <ul class="nav nav-sidebar">
             <li class="active"><a href="perfil_profesor.php">Configuracion Basica</a></li>
           </ul>
         </div>
         <div class="col-sm-9  col-md-9 main">
           <div class="container">
             <div class="row">
              <div class="col-xs-12 col-sm-8 col-sm-offset-3 col-md-8 col-md-offset-3 col-lg-8 col-lg-offset-2">
               <form action="registra_configuracion_profesor.php" method="post" enctype="multipart/form-data">
                 <h2>PROFESOR  <small>Edite sus datos personales</small></h2>
                 <div class="row">
                     <div class="col-xs-6 col-sm-3 col-md-3">
                       <div class="form-group"><h3><small>NOMBRES:</small></h3>
                         <input type="text" name="nombres" placeholder="<?php echo $_SESSION['profesor']->nombres; ?>" class="form-control input-lg" disabled="on">
                       </div>
                      </div>
                      <div class="col-xs-6 col-sm-3 col-md-3">
                        <div class="form-group"><h3><small>APELLIDOS:</small></h3>
                          <input type="text" name="apellidos" placeholder="<?php echo $_SESSION['profesor']->apellidos; ?>" class="form-control input-lg" disabled="on">
                        </div>
                       </div>
                       <div class="col-xs-6 col-sm-3 col-md-3">
                          <div class="form-group"><h3><small>CEDULA:</small></h3>
                            <input type="text" placeholder="<?php echo $_SESSION['profesor']->ci_profesor; ?>" name="ci" class="form-control input-lg" disabled="on">
                          </div>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                          <div class="form-group"><h3><small>CORREO:</small></h3>
                            <input type="text" placeholder="<?php echo $_SESSION['profesor']->correo; ?>" name="correo" class="form-control input-lg" >
                          </div>
                        </div>
                  </div>
                  <div class="row">
                     <div class="col-xs-6 col-sm-3 col-md-3">
                         <div class="form-group"><h3><small>TELEFONO: </small></h3>
                           <input type="text" name="telefono"  class="form-control input-lg" placeholder="<?php echo $_SESSION['profesor']->telefono; ?>">
                         </div>
                     </div>

                     <div class="col-xs-6 col-sm-3 col-md-3">
                         <div class="form-group">
                           <img id="sha" src="<?php echo Variables::$ruta_foto_perfil_padre.$_SESSION['profesor']->foto_path; ?>"  width="150" />
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
                            <input type="text" name="usuario"  class="form-control input-lg" placeholder="<?php echo $_SESSION['profesor']->usuario; ?>">
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
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group"><h3><small>PUEDE CAMBIAR SUS MATERIAS: </small></h3>
                            <?php
                            $conection=new Conection();
                            try {
                              $sql="SELECT `ID_MATERIA`,`NOMBRE_MATERIA`, `ID_GRADO` FROM `materia` WHERE 1";
                              $materias=$conection->getMaterias($sql,"");
                              $MisMaterias=$_SESSION["materias"];?>
                              <select id='pre-selected-options' multiple='multiple' name="materia[]">
                              <?php
                               for($i=0;$i<count($materias);$i++){
                                $materia_grado=$materias[$i]->nombre_materia." ".$materias[$i]->grado_materia;
                                $id_materia=$materias[$i]->id_materia;
                                $materia=$materias[$i];
                                  if(!in_array($materia,$_SESSION['materias'])){
                                  ?>
                                  <option value='<?php echo $id_materia; ?>'><?php echo $materia_grado; ?></option>
                                  <?php
                                  }else{
                                  ?>
                                  <option value='<?php echo $id_materia; ?>' selected="on"><?php echo $materia_grado; ?></option>
                                  <?php
                                  }
                                }
                                $conection->cierraConection();
                            } catch (Exception $e) {
                              echo "linea de error: " . $e->getLine()."<br>";
                              die("Error: " . $e->getMessage());
                            }
                             ?>
                          </select>
                          </div>
                         <span id="mensajeConf"></span>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-12 col-md-6">
                             <a href="sector_profesor_comunicados.php" class="btn btn-primary btn-block btn-lg">Cancelar</a>
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
   <script src="../mijs/jquery.multiselect.js"></script>
   <script type="text/javascript">
   // run pre selected options
   $('#pre-selected-options').multiSelect({ keepOrder: true });
   //$('#keep-order').multiSelect({ keepOrder: true });
   </script>
  </body>
</html>
