<?php
    //Sair da conta 
    session_start();    
    session_unset();
    session_destroy();
    header('Location: LoginView.php');
    exit();
?>