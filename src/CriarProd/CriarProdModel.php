<?php

require_once("../Funcoes/CriaConexao.php");

// verifica o nome ja foi utilizado

function MesmoNome($nome){
    $con = CriarConexao();
    $dados = $con->prepare('SELECT nome FROM produto WHERE nome = :nome');
    $dados->bindValue(':nome',$nome);
    $dados->execute();

    if($dados->rowCount() != 0){
        return 1;
    }else{
        return 0;
    }
}

// verifica a descricao ja foi utilizada

function MesmaDescricao($descricao){
    $con = CriarConexao();
    $dados = $con->prepare('SELECT descricao FROM produto WHERE descricao = :descricao');
    $dados->bindValue(':descricao',$descricao);
    $dados->execute(); 
    if($dados->rowCount() != 0){
        return 1;
    }else{
        return 0;
    }       
}


function CadastraProduto($nome,$descricao,$qtdd_vendida,$preco_normal,$preco_medio,$preco_grande,$preco_gigante,$categoria,$imagem){

    $error_list = [];
    if(MesmoNome($nome) == 1){
        $error_list[] = "Este nome já está sendo utilizado no momento";
    }
    if(MesmaDescricao($descricao) == 1){
        $error_list[] = "Esta descrição utilizada no momento";
    }
    
    $con = CriarConexao();
    $inserir = 'INSERT INTO produto (nome, descricao, qtdd_vendida, preco_normal, preco_medio, preco_grande, preco_gigante, categoria, imagem)
              VALUES (:nome, :descricao, :qtdd_vendida, :preco_normal, :preco_medio, :preco_grande, :preco_gigante, :categoria, :imagem)';
    $consulta = $con->prepare($inserir);
    $consulta ->bindValue(':nome', $nome);
    $consulta ->bindValue(':descricao', $descricao);
    $consulta ->bindValue(':qtdd_vendida', $qtdd_vendida);
    $consulta ->bindValue(':preco_normal', $preco_normal);
    $consulta ->bindValue(':preco_medio', $preco_medio);
    $consulta ->bindValue(':preco_grande', $preco_grande);
    $consulta ->bindValue(':preco_gigante', $preco_gigante);
    $consulta ->bindValue(':categoria', $categoria);
    $consulta ->bindValue(':imagem', $imagem);

    return $consulta->execute();
}

?>