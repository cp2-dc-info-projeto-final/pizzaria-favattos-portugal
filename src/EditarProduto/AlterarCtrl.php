<?php
session_start();
require_once("EditarPModel.php");

// Recebendo dados preenchidos no formulário
$id = $_SESSION['id'];
$nome = $_REQUEST ["nome"];
$descricao = $_REQUEST["descricao"];
if(isset($_REQUEST["preco"])){
    $preco = $_REQUEST["preco"];
}
else{ $preco = null;}

if(isset($_REQUEST["precoM"])){
    $precoM = $_REQUEST["precoM"];
}
else{ $precoM = null;}

if(isset($_REQUEST["precoG"])){
    $precoG = $_REQUEST["precoG"];
}
else{ $precoG = null;}

if(isset($_REQUEST["precoGG"])){
    $precoGG = $_REQUEST["precoGG"];
}
else{ $precoGG = null;}

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
    echo "Socorro";
}

//Alterando dados

$resultAlteracao = AlterarDados($nome,$descricao,$preco,$precoM,$precoG,$precoGG,$id,$imagem_nome);

if($resultAlteracao == 1){
    unset($_SESSION["id"]);
    unset($_SESSION["categoria"]);
    header("location: ../Inicial/index.php");
    exit();
}else{
    header('Location: EditarPView.php?id='.$_SESSION["id"].'&categoria='.$_SESSION["categoria"].'&erros='.urlencode("Nenhum campo foi alterado!"));
    exit();
}

?>