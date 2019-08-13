<?php
function PegarDados($nome){
    //Armazenando dados do usário logado na variável $dados
    require_once("../Funcoes/CriaConexao.php");
    $con = CriarConexao();
    $consulta = $con->prepare("SELECT * FROM produtos WHERE nome = :nome);
    $consulta->bindValue(':nome', $nome);
    $consulta->execute();
    $dados = $consulta->fetch();
    return $dados;
}

?>