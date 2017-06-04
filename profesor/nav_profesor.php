<!-- NAVBAR PROFESOR
================================================== -->
    <script type="text/javascript">
    function elijeMateria(elemento){
        //cambiamos el valor de la etiqueta con id meteriaElejida
        document.getElementById("materiaElejida").innerHTML = elemento.innerHTML;
        document.getElementById("materia").value=elemento.innerHTML;

        //Obtenemos toda la informacion necesaria para la materia solicitada con AJAX

    }
    </script>
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">SICE</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav  navbar-right">
                <li class="active"><a href="sector_profesor.php">Inicio</a></li>
                <li><a href="#">Historia</a></li>
                <li><a href="#">Organización</a></li>
                <li><a href="#">Quines somos</a></li>
                <li class="dropdown">
                  <a href="#" id="materiaElejida" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo "Materia"; ?><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <?php $contador=sizeof($_SESSION['materias']); for ($i=0; $i <$contador ; $i++) {?>
                    <li><a href="#" onclick="elijeMateria(this)"><?php echo $_SESSION['materias'][$i]->getMateria(); ?></a></li>
                    <?php } ?>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['profesor']->nombres; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Perfil</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="../cierre.php">Cerrar Sección</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
