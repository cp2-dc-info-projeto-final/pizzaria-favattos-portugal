<?php

    //Recebendo dados do index
    $id = $_GET["id"];

    $nome = $_GET["nome"];
    
    $preco = $_GET["preco"];

    $descricao = $_GET["descricao"];

    $op = $_GET["op"];

    $pag = $_SERVER['HTTP_REFERER'];

    if (isset($_GET["tamanho"])) {
        $tamanho = $_GET["tamanho"];
    } else {
        $tamanho = null;
    }
    
    session_start();

    //Armazenar dados na variável carrinho
    if (!isset($_SESSION["carrinho"]))
    {
        $carrinho = [];
    } else {
        $carrinho = $_SESSION["carrinho"];
    }
    
    //Se o produto já foi adcionado antes, somente aumenta a quantidade
    $encontrado = false;
    for($i = 0; $i < count($carrinho); $i++) {
        if ($carrinho[$i]["id"] == $id && (is_null($tamanho) || $carrinho[$i]["tamanho"] == $tamanho)) {
            if($op==1){
                $carrinho[$i]["quantidade"] += 1;
                $encontrado = true;  
            }
            elseif($op==2){
                if($carrinho[$i]["quantidade"] == 1){
                    header('Location: RemoverCarrinhoCtrl.php?id='.$id.'&tamanho='.$tamanho.'');
                    exit();
                }
                $carrinho[$i]["quantidade"] -= 1;
                $encontrado = true; 
            }
            else{
            $carrinho[$i]["quantidade"] += 1;
            $encontrado = true;
            }
        }
    }

    //Insere um novo produto no carrinho 
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

    header("Refresh:0; url=$pag");
    exit();
?>