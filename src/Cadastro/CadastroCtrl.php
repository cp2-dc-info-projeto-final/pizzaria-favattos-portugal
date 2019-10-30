
<?php

    
    require_once("CadastroModel.php");
    // RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO
    $nome = $_REQUEST["nome"];
    $email = $_REQUEST["email"];
    $tel = $_REQUEST["telefone"];
    $rua = $_REQUEST["rua"];
    $municipio = $_REQUEST["municipio"];
    $complemento = $_REQUEST["complemento"];
    $data_nascimento = $_REQUEST["dataN"];
    $cpf = $_REQUEST["cpf"];
    $login = $_REQUEST["login"];
    $senha = $_REQUEST["senha"];
    $Csenha = $_REQUEST["Csenha"];

    //Verificando dados
    $erros = "";
    
    try {
        $resultCadastro = CadastraUsuario($nome,$data_nascimento,$email,$login,$senha,$Csenha,$cpf,$municipio,$complemento,$rua,$tel);  
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

