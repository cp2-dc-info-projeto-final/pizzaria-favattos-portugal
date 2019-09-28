<?php
function PegarProdutos($categoria){
    //Armazenando dados do produto de acordo com a categoria na variável $dados
    require_once("../Funcoes/CriaConexao.php");
    $con = CriarConexao();
    $consulta = $con->prepare("SELECT * FROM produto WHERE categoria = :categoria");
    $consulta->bindValue(':categoria', $categoria);
    $consulta->execute();
    $dados = $consulta->fetchAll();
    return $dados;
}

?>