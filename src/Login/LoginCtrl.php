
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
        if(isset($_SESSION['url']) && $_SESSION['url'] != ""){
            header("Location: ".$_SESSION['url']);
        }else{
            header('location:../Inicial/index.php');
        }
    }

    else{
        unset ($_SESSION['logi']);
    	header('Location: LoginView.php?erros='.urlencode($erros));
    }


?>

