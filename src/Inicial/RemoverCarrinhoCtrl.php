<?php

    $id = $_GET["id"];

    $tamanho = $_GET["tamanho"];

    $pag = $_SERVER['HTTP_REFERER'];

    session_start();

    if (!isset($_SESSION["carrinho"]))
    {
        $carrinho = [];
    } else {
        $carrinho = $_SESSION["carrinho"];
        $novo_carrinho = [];
    }

    for($i = 0; $i < count($carrinho); $i++){
        if (!($carrinho[$i]["id"] == $id && $carrinho[$i]["tamanho"] == $tamanho)){
            array_push($novo_carrinho, $carrinho[$i]);
        }
    }

    $_SESSION["carrinho"] = $novo_carrinho;

    header("Refresh:0; url=$pag");
    exit();
    
?>