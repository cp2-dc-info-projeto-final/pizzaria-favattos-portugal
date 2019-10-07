
<!DOCTYPE html>
<html>
<head>
    <title>Finalizar Pedido</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Estilo/Perfil.css">
    <link rel ="stylesheet" href ="../Estilo/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <script src="../Estilo/jquery.min.js"></script>
    <script src="../Estilo/popper.min.js"></script>
    <script src ="../Estilo/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <!-- Logo -->
  <a class="navbar-brand" href="#">
          <img alt="Logo" style="width:40px;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item dropdown">
      <a class="nav-link" href="../Inicial/index.php">Menu</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Nossa Gastronomia</a>
    </li>
    <li class="nav-item">
          <a class="nav-link" href="#">Fotos</a>
    </li>
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Usuário
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../PagUsuario/PerfilView.php">Seu perfil</a>
        <a class="dropdown-item" href="#">Histórico de compras</a>
        <a class="dropdown-item" href="#">Link 3</a>
      </div>
    </li>
  </ul>
  </div>
  </nav>  

 
  <!--Demonstrando dados do usário -->
 
  <div class="container" style="margin-top: 150px">
  <div class="shadow p-3 mb-5 bg-white rounded">
  
  <?php 
    require_once "../Inicial/CarrinhoCtrl.php";
    $ctrl = new CarrinhoCtrl();
    $carrinho = $ctrl->getCarrinho();

    if(count($carrinho) == null){
      echo 'Carrinho vazio, favor adicionar produtos aqui... rs';
    }
    else{
      echo '<div class="row">
      <div class="col"><b>Produto</b></div>
      <div class="col"><b>Descrição</b></div>
      <div class="col"><b>Preço</b></div>
      <div class="col"><b>Tamanho</b></div>
      <div class="col"><b>Quantidade</b></div>
      <div class="col"></div>
      </div><hr>';
      foreach ($carrinho as $item) {
        echo '<div class="row">
        <div class="col">'.$item['nome'].'</div>
        <div class="col">'.$item['descricao'].'</div>
        <div class="col">R$ '.$item['preco'].'</div>
        <div class="col">'.$item['tamanho'].'</div>
        <div class="col">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        '.$item['quantidade'].'</div>
        <div class="col"><a  class="btn btn-info" href="RemoverCarrinhoCtrl.php?id='.$item['id'].'&tamanho='.$item['tamanho'].'">Remover</a></div>
        </div> <hr>';
      }
    }
    ?>
    <br>
    <form id="Pedido" method="POST" action="FinalizarPedidoCtrl.php">
    <h2>Informações do Pedido</h2>
    <hr>
    <div class="form-group">
    <label>Forma de pagamento:</label>
    <div class="custom-control custom-radio">
    <input type ="radio" name="Formapag" id="cart" class="custom-control-input" value="Cartao">
    <label for="cart" class="custom-control-label">Cartão de Crédito ou Débito</label> 
    </div>
    <div class="custom-control custom-radio">
    <input type ="radio" name="Formapag" id="din" class="custom-control-input" value="Dinheiro">
    <label for="din" class="custom-control-label">Dinheiro</label>
    </div>
    </div>
    <div class="form-group">
    <label for="comentario">Adicionar Comentário:</label>
    <textarea class="form-control" id="comentario" rows="3"></textarea>
    </div>
    <b>OBS: O endereço utilizado será o cadastrado. Caso queria alterar: </b><a class="badge badge-primary" href="../PagUsuario/EditarView.php">Alterar</a>
    <hr>
    <br>
    <input type ="submit" name ="FinalizarPedido" value ="FinalizarPedido" class="btn btn-danger">
    </form>

  </div>
  </div>
  
  <!--Rodapé -->
  <nav class="navbar bg-dark navbar-dark fixed-bottom">
    <div class="container">
      <span class="text-muted">Até que enfim foi</span>
  </nav>

</body>
</html>