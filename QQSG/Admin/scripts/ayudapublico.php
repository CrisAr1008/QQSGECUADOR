<?php
include("conexion.php");
$a=0;
$b=0;
$c=0;
$d=0;






$item = getToken();
$organizerKey = $item["organizer_key"];
$token2 = 'Bearer '. $item ["access_token"]; 
$ssesionkey = getSession();
$contents = $_COOKIE["webkey"];
$urlsess = "https://api.getgo.com/G2W/rest/v2/organizers/".$organizerKey."/"."webinars/".$contents."/"."sessions/".$ssesionkey."/polls";

//OBTENER SONDEOS

$curl = curl_init();



curl_setopt_array($curl, array(
  CURLOPT_URL => $urlsess,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: '. $token2
  ),
));

$response5 = curl_exec($curl);

curl_close($curl);





 $item2 = json_decode($response5, true);

 //echo $response5;


 
 //Obtener reportes

 error_reporting(0);


 for ($i = 0; $i <=3; $i++){

    if(strcmp ("A", ($item2 [sizeof($item2)-1]["responses"][$i]["text"])) === 0){
  
      $a = $item2 [sizeof($item2)-1]["responses"][$i]["percentage"];
    
    }else{
    
      if (strcmp ("B", ($item2 [sizeof($item2)-1]["responses"][$i]["text"])) === 0) {
        $b = $item2 [sizeof($item2)-1]["responses"][$i]["percentage"];
      }else{
        if (strcmp ("C", ($item2 [sizeof($item2)-1]["responses"][$i]["text"])) === 0) {
          $c = $item2 [sizeof($item2)-1]["responses"][$i]["percentage"];
        }else{
          if (strcmp ("D", ($item2 [sizeof($item2)-1]["responses"][$i]["text"])) === 0) {
            $d = $item2 [sizeof($item2)-1]["responses"][$i]["percentage"];
          }
        }
  
      }
        
    }
  
  }

  
  if (is_null($a)) {
    $a=10;
  }
  if (is_null($b)) {
    $b=10;
  }
    
  if (is_null($c)) {
    $c=10;
  }
    
  if (is_null($d)) {
    $d=10;
  }
  





