<?php
require_once("model.php");

//Ligando a função do model ao index
function listarProdutos($categoria) {
    return PegarProdutos($categoria);
}

?>