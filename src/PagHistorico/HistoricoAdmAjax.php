<?php
    require_once "HistoricoCtrl.php";
    $historico = recuperarHistoricoCtrlAdm();
    echo json_encode($historico);

?>