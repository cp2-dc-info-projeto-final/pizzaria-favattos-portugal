<?php
session_start();
require_once("UsuarioModel.php");

//Verifica se o usuário está logado
if(!isset($_SESSION["logi"])){
  header("location: ../Login/LoginView.php");
  exit();
}
else{
  $login = $_SESSION["logi"];
}

//Recebo os dados do formulário
$senhaA = $_REQUEST["senhaA"];
$senha = $_REQUEST["senha"];
$Csenha = $_REQUEST["Csenha"];

$erros = "";
  
//Valida a alteração de senha
try {
  $result = AlterarSenha($senhaA,$senha,$Csenha,$login);
}
catch (Exception $e) {
  $erros = $e->getMessage();
}

if (empty($erros)) {      
  header('Location: PerfilView.php');
  exit();
}
else {
  header('Location: EditarView.php?erros='.urlencode($erros));
  exit();
}
?>