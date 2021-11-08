<?php 

//INICIO DE DE SESION
session_start();
$session = $_SESSION['user'];
if($session == null || $session= "" ){
  header("location:index.php");
  die();
}

include("scripts/asistentes.php")
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/loader.css">
  <script src="https://kit.fontawesome.com/479e83529b.js" crossorigin="anonymous"></script>
  <script src="js/abrirPestañas.js"></script>

  <script>
    setTimeout(function() {
      select_id("bienvenida1").innerHTML = "Bienvenido, es tu momento de jugar"
      select_id("bienvenidanombre1").innerHTML = ""
      select_id("pregunta2").style.display="block";
  
      console.log(nom)
    }, 1000 * 8)

    function select_id(id) {
      return document.getElementById(id)
    }
  </script>
  <title>¿Quién quiere ser Geográfico?</title>
</head>

<body>
  <div class="menu">
    <button class="btnx" id="ayuda" data-toggle="tooltip" data-placement="bottom" title="El sistema va a escoger un jugador al azar, luego debe dar clic a jugar" >Ayuda <i class="fas fa-question-circle"></i></button>
    
  
    <button class="btnx" id="ayuda" onclick="volverInicio()">Volver<br><i class="fas fa-arrow-left"></i></button>
  </div>
  <center>
    <div class="logo">
      <img src="img/fondoqqsm.png" width=32.5%>
    </div>
    </center>
  <div class="contenedor">
    <div>
      <div id="bienvenida1" class="loader-animation">
        <div></div>
        <div></div>
        <div></div>
      </div>
      <div id="bienvenidanombre1" class="pregunta">
        Buscando un jugador 
      </div>

      <div id="pregunta2" class="pregunta2">
        <?php echo $participante ?>
      </div>


    </div>
  </div>
  <script src="index.js"></script>
  <div class="grid-container">
  </div>
  <div class="logo2">
      <img src="img/logoesri.png" width=100%>
    </div>
    <center>
  <div class="logo3">
    <img src="img/uclogo.png" width=80%>
  </div>
  </center>
  <div class="millonarioinicio">

    <!-- Primera fila de botones -->
    <div class="millonario__item">
      <div class="opciones">
        <div class="opciones__item">
          <button id="btn" class="button fondoA" onclick="abrirEscogerJugador()"><span class="amarillo">A:</span> Buscar nuevo participante</button>
        </div>

        <div class="opciones__item">
          <button id="btnjugar" class="button fondoB" onclick="abrirJuego()"><span class="amarillo">B:</span> Jugar</button>
        </div>
      </div>
    </div>
  </div>
</body>
<footer class="bg-light text-center text-lg-start">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    Diseñado por el Semillero de Innovación Geográfica GeoGeeks - 2021
  </div>
</footer>
<script src="js/index.js"></script>
  <script src="js/abrirPestañas.js"></script>
</html>