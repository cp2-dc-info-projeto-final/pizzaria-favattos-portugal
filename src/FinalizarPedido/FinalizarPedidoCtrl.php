<?php

session_start();

function ReceberCarrinho(){
  require_once "../Inicial/CarrinhoCtrl.php";
  $ctrl = new CarrinhoCtrl();
  $carrinho = $ctrl->getCarrinho($_SESSION);
  return $carrinho;
}

function FecharCompra($request) {
  if(!isset($_SESSION["logi"])){
    header('Location: FinalizarPedidoView.php?erros='.urlencode("O login precisa ser efetuado para finalizar o pedido"));
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
  $formaPag = $request["Formapag"];
  $comentario = $request["comentario"];
  $precoTotal = 0;
  $datahora = date('Y-m-d H:i:s');
  foreach ($carrinho as $item) {
    $precoTotal += $item['preco'] * $item['quantidade'];
  }
  
  $Pedido = AdicionaPedido($comentario,$formaPag,$precoTotal,$datahora,$usuarioId,$carrinho);
  if($Pedido == 1){
    //
    header('Location: Pedidofinalizado.php');
  }else{
    header('Location: FinalizarPedidoView.php?erros='.urlencode("Ocorreu algum erro"));
    exit();
  }
}

if (!empty($_POST)) {
  FecharCompra($_POST);
}

?>