<!-- NAVBAR PROFESOR
================================================== -->
    <div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
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
              <ul class="nav navbar-nav">
                <li class="active"><a href="sector_profesor.php">Inicio</a></li>
                <li><a href="sector_profesor_comunicados.php">Comunicados</a></li>
                <li><a href="sube_archivos_profesor.php">Archivos</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['padre']->nombres; ?> <span class="caret"></span></a>
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
      </div>
    </div>
