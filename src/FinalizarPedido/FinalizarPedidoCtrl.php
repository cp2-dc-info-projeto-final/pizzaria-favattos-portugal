<?php

session_start();

if(!isset($_SESSION["logi"])){
  header("location: ../Login/LoginView.php");
  exit();
}
else{
  $login = $_SESSION["logi"];
}

require_once("FinalizarPedidoModel.php");
require_once("../PagUsuario/UsuarioModel.php");

$dados = Pegardados($login);
$carrinho = ReceberCarrinho();
$formaPag = $_REQUEST["Formapag"];
$comentario = $_REQUEST["comentario"];




?>