<?php
session_start();
require_once "CarrinhoCtrl.php";
$ctrl = new CarrinhoCtrl();
$carrinho = $ctrl->getCarrinho($_SESSION);

$item = $_GET['item'];
$tamanho = $_GET['tamanho'];
$operacao = $_GET['op'];
$pag = $_SERVER['HTTP_REFERER'];

/*echo $tamanho;
echo $item;*/

foreach ($carrinho as $produto){
    if($produto["id"] == $item && $produto["tamanho"] == $tamanho){
        if($operacao==1){
                $produto["quantidade"] += 1;
        }
        if($operacao==2){
            if($produto["quantidade"] == 1)
            {
                $produto["quantidade"] = 1;
            }
            else{
                $produto["quantidade"] -= 1; 
            }
        }

    }
}

$_SESSION["carrinho"] = $carrinho;
/*header("Location: ../FinalizarPedido/FinalizarPedidoView.php");
exit();



?>