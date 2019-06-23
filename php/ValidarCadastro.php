<?php

function MesmoEmail($email){
    $con = CriarConexao();
    $dados = $con->prepare('SELECT email FROM cliente WHERE email = :email');
    $dados->bindValue(':email',$email);
    $dados->execute();

    if($dados->rowCount() != 0){
        return 1;
    }else{
        return 0;
    }
}

function MesmoLogin($login){
    $con = CriarConexao();
    $dados = $con->prepare('SELECT logi FROM cliente WHERE logi = :logi');
    $dados->bindValue(':logi',$login);
    $dados->execute(); 
    if($dados->rowCount() != 0){
        return 1;
    }else{
        return 0;
    }       
}

function MesmoCpf($cpf){
    $con = CriarConexao();
    $dados = $con->prepare('SELECT cpf FROM cliente WHERE cpf = :cpf');
    $dados->bindValue(':cpf',$cpf);
    $dados->execute();  
    if($dados->rowCount() != 0){
        return 1;
    }else{
        return 0;
    }
}

?>