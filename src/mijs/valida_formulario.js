
$(document).ready(function(){
  //Validacion de los passwords
  $("#password").focusin(function(){
    //$(this).addClass("fondoCaja");
  });
  $("#password").focusout(function(){
    if($(this).val().length>0 && $(this).val().length<6){
      $("#mensaje").html("<span style='color:#BA1C2E;'>Minimo 6 caracteres</span>");//span para poderle dar estilo al mensaje
    }
    else if($(this).val().length>=6 && $(this).val().length<=15){
      $("#mensaje").html("<span style='color:green;'>Contraseña valida</span>")
    }else{
      $("#mensaje").html("<span style='color:#BA1C2E;'>Error: maximo 15 caracteres</span>");
    }
  });

  $("#confirmacion").focusin(function(){

  });

  $("#confirmacion").focusout(function(){
    if($(this).val().length>0 && $(this).val().length<6){
      $("#mensaje").html("<span style='color:#BA1C2E;'>Minimo 6 caracteres</span>");
    }
    else if($(this).val().length>=6 && $(this).val().length<=15){
      if($("#password").val()===$("#confirmacion").val()){
        $("#mensajeConf").html("<span style='color:green;'>Tus contraseñas son iguales</span>");
      }else{
        $("#mensajeConf").html("<span style='color:#BA1C2E;'>Tus contraseñas no coinciden</span>");
      }
    }else {
      $("#mensajeConf").html("<span style='color:#BA1C2E;'>Error: maximo 15 caracteres</span>");
    }
  });
});

function permite(elEvento, permitidos) {
// Variables que definen los caracteres permitidos
var numeros = "123456";
var teclas_especiales = [8, 37, 39, 46];
// 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha
permitidos = numeros;
// Obtener la tecla pulsada
var evento = elEvento || window.event;
var codigoCaracter = evento.charCode || evento.keyCode;
var caracter = String.fromCharCode(codigoCaracter);
// Comprobar si la tecla pulsada es alguna de las teclas especiales
// (teclas de borrado y flechas horizontales)
var tecla_especial = false;
for(var i in teclas_especiales) {
if(codigoCaracter == teclas_especiales[i]) {
tecla_especial = true;
break;
}
}
// Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
// o si es una tecla especial
return permitidos.indexOf(caracter) != -1 || tecla_especial;
}
