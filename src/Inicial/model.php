<?php

require_once("../Funcoes/CriaConexao.php");

function PegarProdutos($categoria){
    //Armazenando dados do produto de acordo com a categoria na variável $dados
    $con = CriarConexao();
    $consulta = $con->prepare("SELECT * FROM produto WHERE categoria = :categoria");
    $consulta->bindValue(':categoria', $categoria);
    $consulta->execute();
    $dados = $consulta->fetchAll();
    return $dados;
}

function MaisPedido(){
    $con = CriarConexao();
    $consulta = $con->prepare("SELECT * FROM produto ORDER BY qtdd_vendida DESC");
    $consulta->execute();
    $dados = $consulta->fetchAll();
    return $dados;
}

?>