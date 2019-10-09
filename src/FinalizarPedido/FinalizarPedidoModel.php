<?php

function ReceberCarrinho(){
    require_once "../Inicial/CarrinhoCtrl.php";
    $ctrl = new CarrinhoCtrl();
    $carrinho = $ctrl->getCarrinho();
    return $carrinho;
}

function AdicionaPedido($comentario, $formaPag, $precoTotal, $diahora, $usuarioId){
    $con = CriarConexao();
    $inserir = 'INSERT INTO pedido (comentario,formaPag,precototal,diahora,usuarioId)
                VALUES (:comentario,:formaPag,:precototal,:diahora,:usuarioId)';
    $consulta = $con->prepare($inserir);
    $consulta ->bindValue(':comentario', $comentario);
    $consulta ->bindValue(':fomraPag', $formaPag);
    $consulta ->bindValue(':precototal', $precoTotal);
    $consulta ->bindValue(':diahora', $diahora);
    $consulta ->bindValue(':usuarioId', $usuarioId);
    $consulta->execute();

    if($consulta->rowCount() > 0){
        return 1;
    }
    else{
        return 0;
    }
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
        return 1;
    }
    else{
        return 0;
    }
}

function PegaIdPedido(){
    $con = CriarConexao();
    $id = $con->lastInsertId();
    return $id;
}


?>