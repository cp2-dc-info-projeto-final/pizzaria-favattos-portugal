<?php
require_once("EditarPModel.php");

function PegarProduto($id){
  $dados= BuscarProduto($id);
  return $dados;
}

?>