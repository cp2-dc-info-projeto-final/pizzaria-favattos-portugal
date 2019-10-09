<?php

session_start();
require_once("FinalizarPedidoMode.php");

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
$usuarioId = $dados['id'];
$formaPag = $_REQUEST["Formapag"];
$comentario = $_REQUEST["comentario"];
$precoTotal = 0;
date_default_timezone_set(‘America/Rio_de_Janeiro’);
$datahora = date('d/m/Y às H:i:s');
foreach ($carrinho as $item) {
  $precoTotal += $item['preco'];
}

$Pedido = AdicionaPedido($comentario,$formaPag,$precoTotal,$diahora,$usuarioId);
if($Pedido == 1){
  $PedidoId = PegaIdPedido();
  foreach ($carrinho as $item){
    $ProdutoPedido = AdicionaProdutoPedido($item['id'],$PedidoId,$item['quantidade']);
    if($ProdutoPedido == 0){
      break;
      header('Location: FinalizarPedidoView.php?erros='.urlencode("Ocorreu algum erro"));
      exit();
    }
  }
}else{
  header('Location: FinalizarPedidoView.php?erros='.urlencode("Ocorreu algum erro"));
  exit();
}

?>