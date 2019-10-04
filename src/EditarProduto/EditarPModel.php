<?php
require_once("../Funcoes/CriaConexao.php");

function BuscarProduto($id){
    //Armazenando dados do produto na variável $dados
    $con = CriarConexao();
    $consulta = $con->prepare("SELECT * FROM produto WHERE id = :id");
    $consulta->bindValue(':id',$id);
    $consulta->execute();
    $dados = $consulta->fetch();
    return $dados;
}

function AlterarDados($nome,$descricao,$preco,$precoM,$precoG,$precoGG,$id){

// Alterando dados do usuário pelos dados informados
$dados = BuscarProduto($id);
if($nome == ""){
    $nome = $dados['nome'];
}
if($descricao == ""){
    $descricao = $dados['descricao'];
}
if($preco == ""){
    $preco = $dados['preco_normal'];
}
if($precoM == ""){
    $precoM = $dados['preco_medio'];
}
if($precoG == ""){
    $precoG = $dados['preco_grande'];
}
if($precoGG == ""){
    $precoGG = $dados['preco_gigante'];
}
$con = CriarConexao();
$consulta = $con->prepare('UPDATE produto SET nome=:nome, descricao=:descricao, preco_normal=:preco_normal, preco_medio=:preco_medio, preco_grande=:preco_grande, preco_gigante=:preco_gigante WHERE id = :id');
$consulta->bindValue(':nome',$nome);
$consulta->bindValue(':descricao',$descricao);
$consulta->bindValue(':preco_normal',$preco);
$consulta->bindValue(':preco_medio',$precoM);
$consulta->bindValue(':preco_grande',$precoG);
$consulta->bindValue(':preco_gigante',$precoGG);
$consulta->bindValue(':id',$id);
$consulta->execute();

if($consulta->rowCount() > 0){
    return 1;
}
else{
    return 0;
}

}

?>