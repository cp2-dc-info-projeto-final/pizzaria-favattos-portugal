<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
</head>

<body>

<?php

    
    require_once("ValidarCadastro.php");
    // RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO
    $nome = $_REQUEST["nome"];
    $email = $_REQUEST["email"];
    $tel = $_REQUEST["telefone"];
    $endereco = $_REQUEST["endereco"];
    $data_nascimento = $_REQUEST["dataN"];
    $cpf = $_REQUEST["cpf"];
    $sexo = $_REQUEST["sexo"];
    $login = $_REQUEST["login"];
    $senha = $_REQUEST["senha"];
    $Csenha = $_REQUEST["Csenha"];


    //Verificando dados
    $erros = [];

    $senha = password_hash($_REQUEST["senha"], PASSWORD_DEFAULT);
    try {
        $resultCadastro = CadastraUsuario($nome,$data_nascimento,$sexo,$email,$login,$senha,$cpf,$endereco,$tel);  
    }
    catch (Exception $e) {
        $erros[] = $e->getMessage();
    }

    if (count($erros)==0) {      
        echo "Seu cadastro foi realizado com sucesso!<br>Agradecemos a atenção.";
    }
    else {
        foreach ($erros as $erro) {
            $text = "$text $erro | ";
            header('Location: PagCadastro.php?erros='.urlencode($text));
        }
    }

?>

</body>
</html>