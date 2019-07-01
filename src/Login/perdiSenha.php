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

    $consulta2 = $con->prepare('INSERT INTO recuperacao VALUES (:email, :chave)');
    $consulta2->bindValue(':email',$email);
    $consulta2->bindValue(":chave",$chave);
    $consulta2->execute();

    //link de recuperação sendo enviado por email
    if($consulta2->rowCount() == 1){
        $link = "http://127.0.0.1/edsa-favatto-portugal/src/Login/RecuperarSenha.php?email=$email&confirmacao=$chave";

        if(mail($email,'Recuperar Senha:','Para recuperar a senha visite esse link: '.$link)){
            echo "<p>Foi enviado um e-mail para o seu endereço, onde poderá encontrar um link único para alterar a sua senha</p>";
        }
        else{
            echo "<p>Houve um erro ao enviar o email (o servidor suporta a função mail?)</p>";
        }
    }
    else{
        echo "<p>Não foi possível gerar o endereço único</p>";
    }


    }else{
        echo "Email não cadastrado";
    }