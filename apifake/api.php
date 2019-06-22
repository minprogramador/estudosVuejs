<?php
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-type:application/json");


function isValidJSON($str) {
   json_decode($str);
   return json_last_error() == JSON_ERROR_NONE;
}

function save($txt) {
  $fp = fopen("dados.json", "w+");
  $escreve = fwrite($fp, $txt);
  fclose($fp);  
}

$someArray = file_get_contents('dados.json');


if($_SERVER['REQUEST_URI'] == '/api/produtos') {
  //ver todos.
  $d = json_decode($someArray, true);
  $arr = json_encode($d);
  echo $arr;
  die;
}else{
  //adicionar elemento - POST json.
  $json_params = file_get_contents("php://input");
  if (strlen($json_params) > 0 && isValidJSON($json_params)) {
    $decoded_params = json_decode($json_params, true);
  }

  if(isset($decoded_params)) {
    if(array_key_exists('body', $decoded_params) && array_key_exists('nome', $decoded_params['body'])) {
      $d = json_decode($someArray, true);
      $manage = $d;//json_decode($someArray, true);
      $manage[] = [
        'id' => (count($someArray) + 1 ),
        'nome' => $decoded_params['body']['nome'],
        'quantidade' => $decoded_params['body']['quantidade'],
        'valor' => $decoded_params['body']['valor']
      ];
      save(json_encode($manage));
      echo (json_encode($decoded_params['body']));
    }else{
      echo json_encode(['msg' => 'erro ao inserir, payload errado.']);
    }
  }
}







