<?php
require_once("../Funcoes/CriaConexao.php");

function registrarcompra($id){
  $conn=CriarConexao();
  $compra = $conn->prepare("SELECT pedido FROM usuario WHERE id=:id");
  $compra->bindvalue(':id',$id);
  $compra->execute();
  $compra= $compra->fetch();
  return $compra;

}

function recuperarHistorico() {
  $conn=CriarConexao();
  $historico = $conn->prepare ("SELECT p.id, p.diahora, p.precototal, p.formaPag, u.nome, u.telefone, u.Rua, u.Municipio, u.Complemento, u.cpf, pro.nome as produto, pp.qtd 
  FROM pedido as p
  join usuario as u
  ON p.usuarioId = u.id
  join produtopedido as pp
  ON pp.idPedido
  join produto as pro
  ON pro.id = pp.idProduto
  ");
  $historico->execute();
  $historico= $historico->fetchAll();
  return $historico;
}

function recuperarHistoricoC($id){
  $conn=CriarConexao();
  $historico = $conn->prepare ("SELECT p.id, p.diahora, p.precototal, p.formaPag, u.nome, u.telefone, u.Rua, u.Municipio, u.Complemento, u.cpf, pro.nome as produto, pp.qtd 
  FROM pedido as p
  join usuario as u
  ON p.usuarioId = u.id
  join produtopedido as pp
  ON pp.idPedido
  join produto as pro
  ON pro.id = pp.idProduto
  WHERE u.id = :id");
  $historico->bindValue(':id',$id);
  $historico->execute();
  $historico= $historico->fetchAll();
  return $historico;
}


?>