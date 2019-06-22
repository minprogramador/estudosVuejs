<?php

header("Access-Control-Allow-Origin: *");
header("Content-type:application/json");

  // Array
$someArray = [
    [
      "id"   => 18,
      "nome" => "Notebook",
      "quantidade" => 100,
      "valor" => 2300
    ],
    [
      "id"   => 2,
      "nome" => "Raspberry PI 3",
      "quantidade" => 50,
      "valor" => 215.5
    ],
    [
      "id"   => 19,
      "nome" => "Arduino UNO",
      "quantidade" => 300,
      "valor" => 52
    ]
  ];

  // Convert Array to JSON String
  $someJSON = json_encode($someArray);
  echo $someJSON;
