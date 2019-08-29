<?php 

    session_start();

    if (!isset($_SESSION["carrinho"]))
    {
        $_SESSION["carrinho"] = [];
    }
    $carrinho = $_SESSION["carrinho"];

    $sacola = array();
    $item = array(
        "nome" => "Pizza Calabresa",
        "tamanho" => "gigante",
        "preco" => 89.90,
        "quantidade" => 5
    );
    array_push($sacola, $item);

    $item = array(
        "nome" => "Pizza Marguerita",
        "tamanho" => "gigante",
        "preco" => 69.90,
        "quantidade" => 3
    );
    array_push($carrinho, $item);
    
    echo json_encode($carrinho);

?>