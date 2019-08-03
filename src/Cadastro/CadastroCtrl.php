<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
</head>

<body>

<?php

    
    require_once("CadastroModel.php");
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
    $erros = "";
    
    try {
        $resultCadastro = CadastraUsuario($nome,$data_nascimento,$sexo,$email,$login,$senha,$Csenha,$cpf,$endereco,$tel);  
    }
    catch (Exception $e) {
        $erros = $e->getMessage();
    }

    if ($erros == "") {      
        header('Location: ../Login/LoginView.php');
        exit();
    }
    else {
            header('Location: CadastroView.php?erros='.urlencode($erros));
            exit();
    }

?>

</body>
</html>