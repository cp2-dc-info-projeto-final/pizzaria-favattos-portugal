<?php
require_once("../Funcoes/CriaConexao.php");


$id = $_GET['id'];
$con = CriarConexao();
$consulta = $con->prepare('DELETE FROM produto WHERE id=:id');
$consulta->bindValue(':id',$id);
$consulta->execute();

if($consulta->rowCount() > 0){
    header("location: ../Inicial/index.php");
    exit();
}
else{
    header('Location: ../Inicial/index.php?erros='.urlencode("Nenhum produto foi alterado!"));
    exit();
}


?>