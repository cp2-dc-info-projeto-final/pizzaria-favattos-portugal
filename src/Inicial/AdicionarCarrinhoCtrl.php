<?php

    session_start();
    if (!isset($_SESSION["carrinho"]))
    {
        $_SESSION["carrinho"] = [];
    }
    
    $item = array(
        "id" => $_POST['id'],
        "tamanho" => $_POST['tamanho'],
        "preco" => $_POST['preco'],
        "quantidade" => 5
    );
    
    array_push($_SESSION["carrinho"], $item);
?>