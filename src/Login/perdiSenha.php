<?php
    require_once("../Funcoes/CriaConexao.php");
    
    //recebendo email de recuperação
    $email = $_REQUEST["email"];

    //testando se é um email válido
    $con = CriarConexao();
    $consulta = $con->prepare('SELECT * FROM cliente WHERE email = :email');
    $consulta->bindValue(':email',$email);
    $consulta->execute();

    if($consulta->rowCount() == 1){
    //email válido

    //cria chave unica para a confirmação
    $chave = sha1(uniqid( mt_rand(), true));
 
    // guardar este par de valores na tabela para confirmar mais tarde
    $con = CriarConexao();
    $consulta = $con->prepare('INSERT INTO recuperacao VALUES (:email, :chave)');
    $consulta->bindValue(':email',$email);
    $consulta->bindValue(":chave",$chave);
    $consulta->execute();

    //link de recuperação
    $con = CriarConexao();
    $con->affectedrows
    $link = 

    }