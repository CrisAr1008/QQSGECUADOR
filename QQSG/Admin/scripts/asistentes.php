<?php 
include("scripts/conexion.php");

$item =  getasistentes();
$asis = $_COOKIE["asistentes"];
if(strlen($asis) == (sizeof($item))){
  $participante = "No quedan participantes.";
}
else{
    $eleccion = rand(0, (sizeof($item)-1));
    $validacion = 0;
do{
    if($validacion == 1){
        if($eleccion ==(sizeof($item)-1)){
            $eleccion = 0;
        }else{
            $eleccion = $eleccion+1;
        }
    }
    $validacion = 0;
    for ($i = 0; $i < strlen($asis);$i++){
        if (intval($asis[$i]) == $eleccion){
            $validacion=1;
        }
    }

}while($validacion == 1);
$participante = $item[$eleccion]["firstName"]." ".$item[$eleccion]["lastName"];
$asis = $asis.$eleccion;
setcookie("asistentes", $asis);
}

// include("scripts/conexion.php");

// $item =  getasistentes();

// $eleccion = rand(0, (sizeof($item)-1));
// $participante = $item[$eleccion]["firstName"]." ".$item[$eleccion]["lastName"];
// if($participante == null)
// {
//  echo "<script>alert('No se encontró el Webinar');</script>";
//  header("Location:./../webinar.php");
// }












