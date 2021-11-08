<?php 

//INICIO DE DE SESION
session_start();
$session = $_SESSION['user'];
if($session == null || $session= "" ){
  header("location:index.php");
  die();
}

include("scripts/ayudapublico.php")
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.js" ></script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script src="https://kit.fontawesome.com/479e83529b.js" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  
  <title>¿Quién quiere ser Geográfico?</title>
</head>

<body background= "img/cue.png">
  <div class="menu">
    <button class="btnx" id="btnayuda" onclick="abrirAyudaPublico()"><i class="fas fa-users"></i></button>
    <button class="btnx" id="btn50" onclick="fiftyFifty()"> 50 / 50</button>
    <button class="btnx" id="btnllamada" onclick="abrirAyudaLlamada()"><i class="fas fa-phone-volume"></i></button>
    <button class="btnx" id="btnvolver" onclick="volverInicio()">Volver<br><i class="fas fa-arrow-left"></i></button>
    <button class="btnx" id="siguiente" onclick="siguiente()">Siguiente<br><i class="fas fa-arrow-right"></i> </button>
    <div class="segundos" id="segundos">--</div>
    <div class="segundos2" id="segundos2">--</div>
  </div>
<div id="ventana3" class="ventana3">
<a><div id="tel"> <img src="img/llamada.png" alt=""> </div></a>
<a href="javascript:cerrarLlamada()"><div id="cerrar"> <img src="img/cerrar.png" alt=""> </div></a>
<span id="ponente1" style="font-size: 140%; font-weight: bold; top: 0%" >Llamando</span>
</div>

<!--**************** M O D A L I D A D   5  P R E G U N T A S ***************************** -->

<div id="ventana4" class="ventana4">
<table class="default">
<tr>
  <td class="amarillo">P5 :</td>
  <td id="p5" class="amarillo" style="display: none">Premio Mayor</td>
</tr>
<tr>
  <td >P4 :</td>
  <td id="p4" style="display: none">Pregunta 4</td>
</tr>
<tr>
  <td class="amarillo">P3 :</td>
  <td id="p3" class="amarillo" style="display: none">Primer premio</td>
</tr>
<tr>
  <td >P2 :</td>
  <td id="p2" style="display: none">Pregunta 2</td>
</tr>
<tr>
  <td >P1 :</td>
  <td id="p1" style="display: none">Pregunta 1</td>
</tr>
<!--<div>Jugando: Nicolas Garzon</div>-->
</table>

</div>


<!--**************** M O D A L I D A D   9  P R E G U N T A S ***************************** -->

<!--<div id="ventana4" class="ventana4">
<table class="default">
<tr>
  <td class="amarillo">P9 :</td>
  <td id="p9" class="amarillo" style="display: none">Premio 9</td>
</tr>
<tr>
  <td >P8 :</td>
  <td id="p8" style="display: none">Premio 8</td>
</tr>
<tr>
  <td >P7 :</td>
  <td id="p7" style="display: none">Premio 7</td>
</tr>
<tr>
  <td class="amarillo">P6 :</td>
  <td id="p6" class="amarillo" style="display: none">Premio 6</td>
</tr>
<tr>
  <td >P5 :</td>
  <td id="p5" style="display: none">Premio 5</td>
</tr>
<tr>
  <td >P4 :</td>
  <td id="p4" style="display: none">Premio 4</td>
</tr>
<tr>
  <td class="amarillo">P3 :</td>
  <td id="p3" class="amarillo" style="display: none">Premio 3</td>
</tr>
<tr>
  <td >P2 :</td>
  <td id="p2" style="display: none">Premio 2</td>
</tr>
<tr>
  <td >P1 :</td>
  <td id="p1" style="display: none">Premio 1</td>
</tr>
</table>
</div>-->
<div class="logo2">
      <img src="img/logoesri.png" width=100%>
    </div>
    <center>
  <div class="logo3">
    <img src="img/uclogo.png" width=80%>
  </div>
  </center>
  <div id="ventana2" class="ventana2">
    <!--<a href="javascript:cerrarAyudaPublico()"><div id="cerrar"> <img src="img/cerrar.png" alt=""> </div></a>-->
    <div>
      <span style="font-size: 230%; font-weight: bold;" class="amarillo">Ayuda del público</span>
    </div>
    <div>
      <canvas id="migrafica"  width="450" height="180"></canvas>
    </div>
  </div>
  <center>
    <div class="logo">
      <img src="img/fondoqqsm.png" width=32.5%>
    </div>
    </center>
  
 
  <div class="contenedor">
    <div class="puntaje" id="puntaje" style="display: none"></div>
    <div >
      <div class="categoria" id="categoria" style="display: none">
      </div>
      <div class="numero" id="numero" style="display: none"></div>
      <div style="font-size: 170%" class="pregunta" id="pregunta">
      </div>
      <img src="#" class="imagen" id="imagen">
    </div>
  </div>
  

 
  <div class="millonario">
  
    <!-- Primera fila de botones -->
    <div class="millonario__item">
      <div class="opciones">
        <div class="opciones__item">
          <button id="btn1" class="button fondoA" onclick="oprimir_btn(0)"><div><span class="amarillo">A: </span></div><div id="btn1-a"></div></button>
        </div>
  
        <div class="opciones__item">
          <button id="btn2" class="button fondoB" onclick="oprimir_btn(1)"><div><span class="amarillo">B: </span></div><div id="btn2-b"></div></button>
        </div>
      </div>
    </div>
  
    <!-- Segunda fila de botones -->
    <div class="millonario__item">
      <div class="opciones">
        <div class="opciones__item">
          <button id="btn3" class="button fondoA" onclick="oprimir_btn(2)"><div><span class="amarillo">C: </span></div><div id="btn3-c"></div></button>
        </div>
        
        <div class="opciones__item">
          <button id="btn4" class="button fondoB" onclick="oprimir_btn(3)"><div><span class="amarillo">D: </span></div><div id="btn4-d"></div></button>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
    
  var ctx = document.getElementById('migrafica');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Opción A', 'Opción B', 'Opción C', 'Opción D'],
          datasets: [{
              label: '# of Votes',
              data: [<?php echo $a;?>, <?php echo $b;?>, <?php echo $c;?>, <?php echo $d;?>],
              backgroundColor: [
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)'
              ],
              borderColor: [
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)'
              ],
              borderWidth: 5
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  </script>
<footer class="bg-light text-center text-lg-start">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    Diseñado por el Semillero de Innovación Geográfica GeoGeeks - 2021
  </div>
</footer>

  <script src="js/index.js"></script>
  <script src="js/abrirPestañas.js"></script>

</html>