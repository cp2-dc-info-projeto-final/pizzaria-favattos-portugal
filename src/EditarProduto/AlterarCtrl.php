<?php
session_start();
require_once("EditarPModel.php");

// Recebendo dados preenchidos no formulário
$nome = $_REQUEST ["nome"];
$descricao = $_REQUEST["descricao"];
$preco = $_REQUEST["preco"];
$precoM = $_REQUEST["precoM"];
$precoG = $_REQUEST["precoG"];
$precoGG = $_REQUEST["precoGG"];
$id = $_SESSION['id'];

//Alterando dados

$resultAlteracao = AlterarDados($nome,$descricao,$preco,$precoM,$precoG,$precoGG,$id);

if($resultAlteracao == 1){
    unset($_SESSION["id"]);
    unset($_SESSION["categoria"]);
    header("location: ../Inicial/index.php");
    exit();
}else{
    header('Location: EditarPView.php?erros='.urlencode("Nenhum campo foi alterado!"));
    exit();
}

?>