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

$senhaA = $_REQUEST["senhaA"];
$senha = $_REQUEST["senha"];
$Csenha = $_REQUEST["Csenha"];

$erros = "";
    
try {
  $result = AlterarSenha($senhaA,$senha,$Csenha);
}
catch (Exception $e) {
    $erros = $e->getMessage();
}

if ($erros == "") {      
    header('Location: PerfilView.php');
    exit();
}
else {
        header('Location: EditarView.php?erros='.urlencode($erros));
        exit();
}
?>