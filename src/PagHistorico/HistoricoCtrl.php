<?php
require_once("HistoricoModel.php");

function registrarcompraCtrl($id){
    $compra = registrarcompra($id);
    return $compra;
}

function recuperarHistoricoCtrl(){
    $historico = recuperarHistorico();
    return $historico;
}

?>