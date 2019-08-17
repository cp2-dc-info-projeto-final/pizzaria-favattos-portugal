<?php
function PegarDados($categoria){
    //Armazenando dados do usário logado na variável $dados
    require_once("../Funcoes/CriaConexao.php");
    $con = CriarConexao();
    $consulta = $con->prepare("SELECT * FROM produto WHERE categoria = :categoria");
    //$consulta->bindValue(':nome', $nome);
    $consulta->bindValue(':categoria', $categoria);
    $consulta->execute();
    $dados = $consulta->fetchAll();
    return $dados;
}

?>