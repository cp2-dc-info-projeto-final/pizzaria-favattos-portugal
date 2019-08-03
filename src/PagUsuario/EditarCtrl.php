<?php
session_start();
require_once("UsuarioModel.php");

if(!isset($_SESSION["logi"])){
  header("location: ../Login/LoginView.php");
  exit();
}
else{
  $login = $_SESSION["logi"];
}

// Recebendo dados preenchidos no formulário
$email = $_REQUEST ["email"];
$sexo = $_REQUEST["sexo"];
$telefone = $_REQUEST["telefone"];
$endereco = $_REQUEST["endereco"];

$resultAlteracao = AlterarDados($email,$sexo,$telefone,$endereco);

if($resultAlteracao == 1){
  header("location: PerfilView.php");
  exit();
}else{
  header('Location: EditarView.php?erros='.urlencode("Nenhum campo foi alterado!"));
  exit();
}


?>