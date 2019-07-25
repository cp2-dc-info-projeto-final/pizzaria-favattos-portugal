<?php
session_start();
require_once("EditarModel.php");

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

$resultaAlteracao = AlterarDados($email,$sexo,$telefone,$endereco);



?>