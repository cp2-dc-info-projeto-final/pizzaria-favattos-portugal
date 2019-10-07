<?php
require_once("../Funcoes/CriaConexao.php");

function registrarcompra($id){
  $con=CriarConexao();
  $compra = $con->prepare("SELECT pedido FROM usuario WHERE id=:id");
  $compra->bindvalue(':id',$id);
  $compra->execute();
  $compra= $compra->fetch();
  return $compra;

}

?>