<?php

    
require_once("CriarProdModel.php");
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO
$nome = $_REQUEST["nome"];
$descricao = $_REQUEST["descricao"];
$qtdd_vendida = $_REQUEST["qtdd_vendida"];
$preco_normal = $_REQUEST["precoP"];
$preco_medio = $_REQUEST["precoM"];
$preco_grande = $_REQUEST["precoG"];
$preco_gigante = $_REQUEST["precoGG"];
$categoria = $_REQUEST["Categoria"];
//$imagem = $_REQUEST["imagem"];

//Verificando dados
$erros = "";

try {
    $resultProduto = CadastraProduto($nome, $descricao, $qtdd_vendida, $preco_normal, $preco_medio, $preco_grande, $preco_gigante, $categoria);  
}
catch (Exception $e) {
    $erros = $e->getMessage();
}

if ($erros == "") {      
    header('Location: ../Inicial/index.php');
    exit();
}
else {
        header('Location: CriarProdView.php?erros='.urlencode($erros));
        exit();
}

?>
