<?php

    session_start();

    if (!isset($_SESSION["carrinho"]))
    {
        $_SESSION["carrinho"] = [];
    }
    
    
    $item = array(
        "id" => $_GET['id'],
        "tamanho" => $_GET['tamanho'],
        "preco" => $_GET['preco'],
        "quantidade" => 5
    );
    array_push($_SESSION["carrinho"], $item);

    header("Location: Index.php");
?>