<?php
include("conexion.php");

$WebinarKey = isset($_POST['Wk']) ? $_POST['Wk']:'';



if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

  if(validarWebkey($WebinarKey) == true){
    
    setcookie("webkey", $WebinarKey);
    setcookie("asistentes", "");
    $session=getSession();
    if($session == 1){
      echo "<script>alert('No se encontraron sesiones en el Webinar');</script>";
    }else{
      header("Location: inicio.php");
    }

  }else{
    echo "<script>alert('No se encontró el Webinar');</script>";
  }
  
}

?>