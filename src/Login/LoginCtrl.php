
<?php

    session_start();
    require_once("LoginModel.php");
    
// Recebendo dados preenchidos no formulário
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
        header('location:../PagUsuario/PerfilView.php');
    }

    else{
        unset ($_SESSION['logi']);
    	header('Location: LoginView.php?erros='.urlencode($erros));
    }


?>

