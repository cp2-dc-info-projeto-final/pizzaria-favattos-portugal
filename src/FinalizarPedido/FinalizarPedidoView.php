
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
    <script>
      function process(quant,item,tamanho){
        if(quant == 1){
          window.location.replace("../Inicial/AumentarDiminuir.php?item="+item+"&op="+1+"$tamanho="+tamanho);
        }
        else{
          window.location.replace("../Inicial/AumentarDiminuir.php?item="+item+"&op="+2+"$tamanho="+tamanho);
        }
      }
    </script>
    <style>
    .alert {
      margin-bottom: 8px !important;
    }

    .popover {
      max-width: 100% !important;
    }

    footer{
      position:absolute;
      bottom:0;
      width:100%;
      background-color: #212529;
      color: #6c757d;
    }
  </style>
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
          <a class="nav-link" href="../Fotos/pagfotosView.php">Fotos</a>
    </li>
      </ul>
    </div>

    <!-- Entrar e cadastrar na direita -->
    <?php

    session_start();
    if (!isset($_SESSION["logi"])) {
      echo '
      <div class ="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class ="navbar-nav ml-auto">
      <li class="nav-item">
       <a class="nav-link" href="../Cadastro/CadastroView.php">Cadastrar</a> 
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../Login/LoginView.php">Entrar</a> 
      </li>
      </ul>
        </div>';
    } else {
      $login = $_SESSION["logi"];
      echo '
      <div class ="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class ="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle ml-auto" href="#" id="navbardrop" data-toggle="dropdown">
          Usuário
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="../PagUsuario/PerfilView.php">Seu perfil</a>
          <a class="dropdown-item" href="../PagHistorico/HistoricoViewC.php">Histórico de compras</a>
        </div>
      </li>
      </ul>
      </div>';
    }
    session_abort();
    ?>

    <!-- fim da barra de navegação aqui -->
  </nav>
 
  <div class="container" style="margin-top: 150px">
  <div class="shadow p-3 mb-5 bg-white rounded">
  
  <!-- Caixa de erros -->
  <?php
      if (isset($_REQUEST['erros'])) {
        $erros = $_REQUEST['erros'];
        foreach (explode("|", $erros) as $erros_item) {
          ?>
          <div class="alert alert-danger" role="alert">
          <?php
          print($erros_item . ".");
          ?>
          </div>
          <?php
        }
      }
      
    ?>
    
  <?php 
    require_once("FinalizarPedidoCtrl.php");

    $url = $_SERVER["REQUEST_URI"];
    $_SESSION['url'] = $url;

    $carrinho = ReceberCarrinho();

    if(count($carrinho) == null){
      echo 'Carrinho vazio, favor adicionar produtos aqui... rs';
      header('Location: ../Inicial/index.php');
      exit();
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
        <div class="col">&nbsp;&nbsp;
        <a href="../Inicial/AdicionarCarrinhoCtrl.php?id='.$item['id'].'&nome='.$item['nome'].'&tamanho='.$item['tamanho'].'&preco='.$item['preco'].'&descricao='.$item['descricao'].'&op=1">+</a>
        '.$item['quantidade'].'
        <a href="../Inicial/AdicionarCarrinhoCtrl.php?id='.$item['id'].'&nome='.$item['nome'].'&tamanho='.$item['tamanho'].'&preco='.$item['preco'].'&descricao='.$item['descricao'].'&op=2">-</a>
        </div>
        <div class="col"><a  class="btn btn-info" href="../Inicial/RemoverCarrinhoCtrl.php?id='.$item['id'].'&tamanho='.$item['tamanho'].'">Remover</a></div>
        </div> <hr>';
      }
    }
    ?>
    <br>
    <form id="Pedido" method="POST" action="FinalizarPedidoCtrl.php">
    <h2>Informações do Pedido</h2>
    <hr>
    <div class="form-group">
    <label for="formaPag">Forma de pagamento</label>
    <select id="formaPag" name="formaPag" class="form-control" style="width:400px;" required>
        <option value="" disabled selected>Selecione uma opção</option>
        <option value="Dinhiero">Dinheiro</option>
        <option value="Cartão">Cartão de crédito ou débito</option>
    </select>
    </div>
    <div class="form-group">
    <label for="comentario">Adicionar Comentário:</label>
    <textarea class="form-control" name ="comentario" id="comentario" rows="3"></textarea>
    </div>
    <b>OBS: O endereço utilizado será o cadastrado. Caso queria alterar: </b><a class="badge badge-primary" href="../PagUsuario/EditarView.php">Alterar</a>
    <hr>
    <br>
    <input type ="submit" name ="FinalizarPedido" value ="FinalizarPedido" class="btn btn-danger">
    </form>

  </div>
  </div>
  
  <!--Rodapé -->
  <footer class="page-footer pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col text-justify">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id felis in justo blandit egestas blandit nec nibh. Donec pellentesque nulla vel quam aliquam, sed posuere augue euismod. Quisque iaculis sit amet lectus eu accumsan. Nulla mattis mattis mauris, sed rutrum nulla molestie non. Mauris non interdum lacus, a varius lacus. Ut iaculis aliquet purus sed congue. Suspendisse egestas placerat arcu ut mattis. Cras mollis felis lorem, ac euismod justo sodales sit amet.</p>
          </div>
          <div class="col text-center">
          largar uns links aqui tlgd
          </div>
        </div>
      </div>
  </footer>

</body>
</html>