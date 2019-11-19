<?php
    $id = $_GET['id'];

    require_once("HistoricoModel.php");
    
    ConfirmarPedido($id);
    header('Location: HistoricoViewA.php');
    exit();

?>