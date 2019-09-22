<?php

    $id = $_GET["id"];

    $tamanho = $_GET["tamanho"];

    if (!isset($_SESSION["carrinho"]))
    {
        $carrinho = [];
    } else {
        $carrinho = $_SESSION["carrinho"];
    }

    for($i=0; $i < count($carrinho); $i++){
        if($carrinho[$i]["id"] == $id && $carrinho[$i]["tamanho"] == $tamanho){
            unset($_SESSION["carrinho"][$i]);
        }
    }

    header("Location: Index.php");
?>