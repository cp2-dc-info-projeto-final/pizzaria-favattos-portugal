<?php
session_start();

if(!isset($_SESSION["logi"])){
  header("location: ../Login/Login.html");
}
else{
  $login = $_SESSION["logi"];
}

// Recebendo dados preenchidos no formulário
$email = $_REQUEST ["email"];
$sexo = $_REQUEST["sexo"];
$telefone = $_REQUEST["telefone"];
$endereco = $_REQUEST["endereco"];





?>