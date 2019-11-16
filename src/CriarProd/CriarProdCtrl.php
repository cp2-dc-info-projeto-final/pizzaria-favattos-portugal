<?php

    
require_once("CriarProdModel.php");
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO
$nome = $_REQUEST["nome"];
$descricao = $_REQUEST["descricao"];
$qtdd_vendida = $_REQUEST["qtdd_vendida"];
$preco_normal = $_REQUEST["precoP"];
$preco_grande = $_REQUEST["precoG"];
$preco_gigante = $_REQUEST["precoGG"];
$categoria = $_REQUEST["Categoria"];

if(isset($_FILES["imagem"])){

    $imagem = $_FILES["imagem"];

    //diretorio das imagens
    $pasta_dir = "../Imagens/";
    //se nao existir a pasta ele cria uma
    if(!file_exists($pasta_dir)){
    mkdir($pasta_dir);
    }
    
    $imagem_nome = $pasta_dir.$imagem['name'];
    // Faz o upload da imagem
    move_uploaded_file($imagem["tmp_name"], $pasta_dir.$imagem_nome);
}
else{
    $imagem_nome = "";
}

//Verificando dados
$erros = "";

try {
    $resultProduto = CadastraProduto($nome, $descricao, $qtdd_vendida, $preco_normal, $preco_grande, $preco_gigante, $categoria,$imagem_nome);  
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
