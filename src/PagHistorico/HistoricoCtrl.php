<?php
require_once("HistoricoModel.php");

function registrarcompraCtrl($id){
    $compra = registrarcompra($id);
    return $compra;
}

function recuperarHistoricoCtrlAdm(){
    $historico = recuperarHistorico();
    return $historico;
}

function recuperarHistoricoCCtrl($id){
    $historico = recuperarHistoricoC($id);
    return $historico;
}

?>