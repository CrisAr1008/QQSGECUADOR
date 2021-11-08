<?php

error_reporting(0);
//Automatizacion del token de acceso

function getToken()
{

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.getgo.com/oauth/v2/token',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'grant_type=refresh_token&refresh_token=eyJraWQiOiJvYXV0aHYyLmxtaS5jb20uMDIxOSIsImFsZyI6IlJTNTEyIn0.eyJzYyI6ImNhbGxzLnYyLmluaXRpYXRlIG1lc3NhZ2luZy52MS53cml0ZSBpZGVudGl0eTpzY2ltLm9yZyBpZGVudGl0eTpzY2ltLm1lIHJlYWx0aW1lLnYyLm5vdGlmaWNhdGlvbnMubWFuYWdlIG1lc3NhZ2luZy52MS5ub3RpZmljYXRpb25zLm1hbmFnZSBzdXBwb3J0OiBtZXNzYWdpbmcudjEuc2VuZCBpZGVudGl0eTogd2VicnRjLnYxLnJlYWQgbWVzc2FnaW5nLnYxLnJlYWQgd2VicnRjLnYxLndyaXRlIGNvbGxhYjogdXNlcnMudjEubGluZXMucmVhZCBjci52MS5yZWFkIiwibHMiOiI3YmNkMzBhOC01ZDcwLTQ0MGYtOTdmOS0yODkyY2I3YjU2YWMiLCJvZ24iOiJwd2QiLCJhdWQiOiJmNjEzMGZjNS1iOGQyLTRkMTYtOGY4Zi0yMmFkZjcxNzAwMjYiLCJzdWIiOiIzMDAwMDAwMDAwMDA0NDYxMjMiLCJqdGkiOiJlMjQ4YmYxYS0xNWM0LTRhNjQtOWZlYi1hNzExN2MzZTdlMjUiLCJleHAiOjE2Mjg3NzU4MzksImlhdCI6MTYyNjE4MzgzOSwidHlwIjoiciJ9.dICSRHDkHvKVEjgOquPcoHg3xo_8zh5qfo5g9OenI7MtQIZPGl3vdNOgzONLXM2p3SPEo4OIjKefulQDQTUAi1Jf5iA6VZmfIW5IPFd3OqovPfRufDrohoGJlPF8lk7DinUYC5P6FLzmo7ZuxJL26byvRq7j81nfL2-FI_9pnnnu6e4_GUMV1VnlKAGG6oSbJgfLhZ5nKXUdvggoyKxswhmt6PngVFsdfTx5VhSkx7ud3H_Zj-dk-xL2sIMGESM0caPyLRvemz_3aBnQ7FZ3DEYJepQ4iodwvBVP2JSzDMWpaJbcOd0HTI5hIBUxNws7Urnf_Yzq8dSgrkoxJjberQ',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/x-www-form-urlencoded',
      'Authorization: Basic ZjYxMzBmYzUtYjhkMi00ZDE2LThmOGYtMjJhZGY3MTcwMDI2OjRmUzFXdWNHeldDUTF5MUxQMXZxQm5Mbg=='
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  //echo $response;

  //Obtener token de acceso en una variable 
  $item = json_decode($response, true);
  return $item;
  
}



function conectar()
{

$item = getToken();
$token = $item["access_token"];
$organizerKey = $item["organizer_key"];
$accountsKey = $item["account_key"];
$token2 = "Bearer " . $token;
$urlwebinnars = 'https://api.getgo.com/G2W/rest/v2/organizers/'.$organizerKey.'/webinars?fromTime=2021-06-20T00:00:00Z&toTime=2022-06-21T00:00:00Z&page=0&size=64';



  //OBTENER TODOS LOS WEBINARS 
  
  $curl = curl_init();



curl_setopt_array($curl, array(

  CURLOPT_URL => $urlwebinnars,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: ' .$token2
  ),

));



$response2 = curl_exec($curl);



curl_close($curl);
  

$itemweb = json_decode($response2, true);
//echo $response2;
return $itemweb;



//echo $response2;

}





//Validar web key

function validarWebkey($WebinarKey)
{
  $validacion = false;
  $itemweb = conectar();

  for ($i = 0; $i < sizeof($itemweb["_embedded"]["webinars"]); $i++) {
    if (strcmp($WebinarKey, ($itemweb["_embedded"]["webinars"][$i]["webinarKey"])) === 0) {
      $validacion = true;
    
    }
  }
  if ($validacion == true) {
    return $validacion;
  } else {
    return $validacion;
  }


}






//TRAER DATOS DE LAS SECCIONES

function getSession()
{

  $item = getToken();
  $token = $item["access_token"];
  $organizerKey = $item["organizer_key"];
  $accountsKey = $item["account_key"];
  $token2 = "Bearer " . $token;
  $contents = $_COOKIE["webkey"];
  $urlsession = 'https://api.getgo.com/G2W/rest/v2/organizers/' . $organizerKey . '/' . 'webinars/' . $contents . '/sessions';


  $curl = curl_init();




  curl_setopt_array($curl, array(
    CURLOPT_URL => $urlsession,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'Authorization: ' . $token2
    ),
  ));

  $response2 = curl_exec($curl);

  curl_close($curl);
  //echo $response2;

  $item2 = json_decode($response2, true);

  $sessionKey = $item2["_embedded"]["sessionInfoResources"][(sizeof($item2["_embedded"]["sessionInfoResources"]) - 1)]["sessionKey"];
  if($sessionKey==null){
    return 1;
  }
  else{
    return $sessionKey;
  }
}



//traer asistentes 

function getasistentes()
{
  $item = getToken();
  $token = $item["access_token"];
  $organizerKey = $item["organizer_key"];
  $token2 = "Bearer " . $token;
  $contents = $_COOKIE["webkey"];

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.getgo.com/G2W/rest/v2/organizers/' . $organizerKey . '/webinars' . '/' . $contents . '/registrants',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'Authorization: ' . $token2
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  //echo $response;
  $item = json_decode($response, true);

  return $item;
}
