<?php

    $id = $_GET["id"];

    $nome = $_GET["nome"];
    
    $preco = $_GET["preco"];

    $descricao = $_GET["descricao"];

    if (isset($_GET["tamanho"])) {
        $tamanho = $_GET["tamanho"];
    } else {
        $tamanho = null;
    }
    
    session_start();
    //session_destroy();


    if (!isset($_SESSION["carrinho"]))
    {
        $carrinho = [];
    } else {
        $carrinho = $_SESSION["carrinho"];
    }
    
    $encontrado = false;
    for($i = 0; $i < count($carrinho); $i++) {
        if ($carrinho[$i]["id"] == $id && (is_null($tamanho) || $carrinho[$i]["tamanho"] == $tamanho)) {
            $carrinho[$i]["quantidade"] += 1;
            $encontrado = true;
        }
    }

    if (!$encontrado) {
        $item = array(
            "id" => $id,
            "nome" => $nome,
            "preco" => $preco,
            "descricao" => $descricao,
            "quantidade" => 1
        );

        if (!is_null($tamanho)) {
            $item["tamanho"] = $tamanho;
        }
        array_push($carrinho, $item);
    }
    
    $_SESSION["carrinho"] = $carrinho;

    header("Location: Index.php");
?>