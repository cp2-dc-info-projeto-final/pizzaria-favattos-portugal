<!DOCTYPE html>
<html>
<head>
   <title>login</title> 

</head>

<body>

<?php

    session_start();
    require_once("LoginModel.php");
    
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO
    $login = $_REQUEST ["emailLogin"];
    $senha = $_REQUEST["senha"];
// Testando os dados
    try{
        $resultLogin = Cadastrado($login,$senha);
    }
    catch(Exception $e){
        $erros = $e->getMessage();
    }

    if($erros==""){
        $_SESSION['logi'] = $login;
        header('location:../PagUsuario/perfil.php');
    }

    else{
        unset ($_SESSION['logi']);
    	header('Location: LoginView.php?erros='.urlencode($erros));
    }


?>

</body>

</html>