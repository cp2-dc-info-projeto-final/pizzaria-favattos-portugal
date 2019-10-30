<?php

if(!isset($_SESSION["logi"])){
    header('Location: FinalizarPedidoView.php?erros='.urlencode("O login precisa ser efetuado para finalizar o pedido"));
    exit();
  } 

function AdicionaPedido($comentario, $formaPag, $precoTotal, $diahora, $usuarioId, $carrinho){
    $error_list = [];
    if($formaPag==""){
        $error_list[] = "Selecione uma forma de pagamento";
    }
    if(is_null($carrinho)){
        $error_list[] = "Carrinho Vazio";
    }
    

    $con = CriarConexao();
    $inserir = 'INSERT INTO pedido (comentario,formaPag,precototal,diahora,usuarioId)
                VALUES (:comentario,:formaPag,:precototal,:diahora,:usuarioId)';
    $consulta = $con->prepare($inserir);
    $consulta ->bindValue(':comentario', $comentario, PDO::PARAM_STR);
    $consulta ->bindValue(':formaPag', $formaPag, PDO::PARAM_STR);
    $consulta ->bindValue(':precototal', $precoTotal);
    $consulta ->bindValue(':diahora', $diahora, PDO::PARAM_STR);
    $consulta ->bindValue(':usuarioId', $usuarioId, PDO::PARAM_INT);
    $consulta->execute();

    if($consulta->rowCount() == 0){
        $error_list[] = "Ocorreu algo de errado!";
    }

    $PedidoId = $con->lastInsertId();

    foreach ($carrinho as $item){
        $ProdutoPedido = AdicionaProdutoPedido($item['id'],$PedidoId,$item['tamanho'],$item['quantidade']);
        if(!$ProdutoPedido){
            $error_list[] = "Ocorreu algo de errado!";
        }
    }

    if (!empty($error_list)) {
        throw new Exception(implode('|', $error_list));
    }
}

function AdicionaProdutoPedido($idProduto,$idPedido,$tamanho,$qtd){
    $con = CriarConexao();
    $inserir = 'INSERT INTO produtopedido (idProduto,idPedido,tamanho,qtd)
                VALUES (:idProduto,:idPedido,:tamanho,:qtd)';
    $consulta = $con->prepare($inserir);
    $consulta ->bindValue(':idProduto', $idProduto);
    $consulta ->bindValue(':idPedido', $idPedido);
    $consulta ->bindValue(':tamanho', $tamanho);
    $consulta ->bindValue(':qtd', $qtd);
    $consulta->execute();

    if($consulta->rowCount() > 0){
        return true;
    }
    else{
        return false;
    }
}

?>