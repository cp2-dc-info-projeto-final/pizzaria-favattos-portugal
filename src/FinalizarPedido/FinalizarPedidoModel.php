<?php

function AdicionaPedido($comentario, $formaPag, $precoTotal, $diahora, $usuarioId, $carrinho){
    $con = CriarConexao();
    $inserir = 'INSERT INTO pedido (comentario,formaPag,precototal,diahora,usuarioId)
                VALUES (:comentario,:formaPag,:precototal,:diahora,:usuarioId)';
    $consulta = $con->prepare($inserir);
    $consulta ->bindValue(':comentario', $comentario, PDO::PARAM_STR);
    $consulta ->bindValue(':formaPag', $formaPag, PDO::PARAM_STR);
    $consulta ->bindValue(':precototal', $precoTotal);
    $consulta ->bindValue(':diahora', $diahora, PDO::PARAM_STR);
    #echo $diahora;
    #exit();
    $consulta ->bindValue(':usuarioId', $usuarioId, PDO::PARAM_INT);
    $consulta->execute();

    if($consulta->rowCount() == 0){
        return false;
    }

    $PedidoId = $con->lastInsertId();

    foreach ($carrinho as $item){
        $ProdutoPedido = AdicionaProdutoPedido($item['id'],$PedidoId,$item['quantidade']);
        if(!$ProdutoPedido){
            return false;
        }
    }

    return true;
}

function AdicionaProdutoPedido($idProduto,$idPedido,$qtd){
    $con = CriarConexao();
    $inserir = 'INSERT INTO produtopedido (idProduto,idPedido,qtd)
                VALUES (:idProduto,:idPedido,:qtd,)';
    $consulta = $con->prepare($inserir);
    $consulta ->bindValue(':idProduto', $idProduto);
    $consulta ->bindValue(':idPedido', $idPedido);
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