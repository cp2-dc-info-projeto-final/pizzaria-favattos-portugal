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
  $historico = [];
  $conn=CriarConexao();
  $pedidos = $conn->prepare ("SELECT p.id, p.diahora, p.precototal, p.formaPag,
  u.nome, u.telefone, u.Rua, u.Municipio, u.Complemento, u.cpf 
  FROM pedido as p
  join usuario as u
  ON p.usuarioId = u.id
  ORDER BY diahora DESC");
  $pedidos->execute();
  if ($pedidos)
  {
    while ($row = $pedidos->fetch(PDO::FETCH_ASSOC)) {
      $pedido = [];
      $pedido['id'] = $row['id'];
      $pedido['itens'] = recuperarPedido($row['id']);
      $pedido['diahora'] = $row['diahora'];
      $pedido['precototal'] = $row['precototal'];
      $pedido['formapag'] = $row['formaPag'];
      $pedido['usuario'] = $row['nome'];
      $pedido['telefone'] = $row['telefone'];
      $pedido['rua'] = $row['Rua'];
      $pedido['municipio'] = $row['Municipio'];
      $pedido['complemento'] = $row['Complemento'];
      $pedido['cpf'] = $row['cpf'];
      array_push($historico, $pedido);
    }
  } else {
    die("morri!");
  }
  
  
  return $historico;
}

function recuperarHistoricoC($id) {
  $historico = [];
  $conn=CriarConexao();
  $pedidos = $conn->prepare ("SELECT p.id, p.diahora, p.precototal, p.formaPag, p.estado,
  u.nome, u.telefone, u.Rua, u.Municipio, u.Complemento, u.cpf 
  FROM pedido as p
  join usuario as u
  ON p.usuarioId = u.id
  WHERE u.id = :id
  ORDER BY diahora DESC");
  $pedidos->bindValue(':id',$id);
  $pedidos->execute();
  if ($pedidos)
  {
    while ($row = $pedidos->fetch(PDO::FETCH_ASSOC)) {
      $pedido = [];
      $pedido['id'] = $row['id'];
      $pedido['itens'] = recuperarPedido($row['id']);
      $pedido['diahora'] = $row['diahora'];
      $pedido['precototal'] = $row['precototal'];
      $pedido['formapag'] = $row['formaPag'];
      $pedido['usuario'] = $row['nome'];
      $pedido['telefone'] = $row['telefone'];
      $pedido['rua'] = $row['Rua'];
      $pedido['municipio'] = $row['Municipio'];
      $pedido['complemento'] = $row['Complemento'];
      $pedido['cpf'] = $row['cpf'];
      $pedido['estado'] = $row['estado'];
      array_push($historico, $pedido);
    }
  } else {
    die("morri!");
  }
  
  
  return $historico;
}

function recuperarPedido($id_pedido) {
  $conn=CriarConexao();
  $itens_pedido = $conn->prepare ("SELECT pro.nome as produto, pp.qtd, pp.tamanho,
  preco_normal, preco_medio, preco_grande, preco_gigante FROM produtopedido as pp
  join produto as pro
  ON pro.id = pp.idProduto
  WHERE pp.idPedido = :id_pedido
  ");
  $itens_pedido ->bindValue(':id_pedido', $id_pedido, PDO::PARAM_INT);
  $itens_pedido->execute();
  $itens = [];
  while ($row = $itens_pedido->fetch(PDO::FETCH_ASSOC)) {
    $item = [];
    $item['produto'] = $row['produto'];
    $item['qtd'] = $row['qtd'];
    $item['tamanho'] = $row['tamanho'];

    if ($item['tamanho'] == 'normal') {
      $item['preco'] = $row['preco_normal'];
    } else if ($item['tamanho'] == 'medio') {
      $item['preco'] = $row['preco_medio'];
    } else if ($item['tamanho'] == 'grande') {
      $item['preco'] = $row['preco_grande'];
    } else if ($item['tamanho'] == 'gigante') {
      $item['preco'] = $row['preco_gigante'];
    }
    
    array_push($itens, $item);
  }
  return $itens;
}


?>