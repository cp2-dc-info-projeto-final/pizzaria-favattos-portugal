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
    header('Location: ../Login/LoginView.php?erros='.urlencode("O login precisa ser efetuado para finalizar o pedido"));
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
  $formaPag = $request["formaPag"];
  $comentario = $request["comentario"];
  $precoTotal = 0;
  date_default_timezone_set('America/Sao_Paulo');
  $datahora = date('d-m-Y H:i:s');
  
  foreach ($carrinho as $item) {
    $precoTotal += $item['preco'] * $item['quantidade'];
  }
  
  try {
    $resultPedido = AdicionaPedido($comentario,$formaPag,$precoTotal,$datahora,$usuarioId,$carrinho); 
  }
  catch (Exception $e) {
    $erros = $e->getMessage();
  }

  if ($erros == "") {      
    header('Location: PedidoFinalizado.php?formaPag='.$formaPag);
    exit();
  }
  else {
        header('Location: ../Login/LoginView.php');
        exit();
  }

}

if (!empty($_POST)) {
  FecharCompra($_POST);
}

?>