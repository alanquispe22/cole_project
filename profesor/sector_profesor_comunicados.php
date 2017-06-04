<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script>
    //script que sirve para subir los comunicados
      function publicaComunicado(fecha, materia, comunicado){
        //definimos un array
        var parametros = {
                "fecha" : fecha,
                "materia" : materia,
                "comunicado" : comunicado
        };
        //envio mediante ajax
        $.ajax({
                data:  parametros,//contenido que se envia
                url:   'publica_comunicado.php',//direccion del archivo q lo recibira
                type:  'post',
                //metodo: accion mientras se procesa el envio
                beforeSend: function () {
                        $("#res").html("Procesando, espere por favor...");
                },
                //metodo: response es el resultado devuelto
                success:  function (response) {
                        $("#res").html(response);
                }
        });
      }
      </script>
  </head>
  <body>
    <?php
    include("claseComunicado.php");
    include("claseMateria.php");
    include("clase_usuario_profesor.php");
    session_start();
    if(!isset($_SESSION["profesor"])){
      header("location:../index.php");
    }
    require("nav_profesor.php");
    ?>
     <form>
       <label for="text">Puede comunicar algo a su curso:</label><br>
       <input type="text" id="fecha" value="">
       <input type="text" id="materia" value="">
       <textarea  id="comunicado" class="form-control" rows="3" cols="20"></textarea><br>
       <input type="button" href="javascript:;" onclick="publicaComunicado($('#fecha').val(),$('#materia').val(), $('#comunicado').val());return false;"  class="btn btn-default" value="Publicar"/>
     </form>


    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
