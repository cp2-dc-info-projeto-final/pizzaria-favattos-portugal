
<!DOCTYPE html>
<html>
<head>
    <title>Pedido Realizado</title>
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
    </ul>
    </div>
    <?php
    session_start();
    if (!isset($_SESSION["logi"])) {
      echo '<div class ="collapse navbar-collapse" id="collapsibleNavbar">
    <a class ="navbar-brand"></a>
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
    <ul class ="navbar-nav">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Usuário
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="../PagUsuario/PerfilView.php">Seu perfil</a>
        <a class="dropdown-item" href="#">Histórico de compras</a>
      </div>
    </li>
    </ul>';
    }
    session_abort();
    ?>
   </nav>  

 
  <!--Demonstrando dados do usário -->
 
  <div class="container" style="margin-top: 150px">
  <div class="shadow p-3 mb-5 bg-white rounded">

  <div class="alert alert-success" role="alert">Pedido Realizado com sucesso!</div><br>
  <h2> Dados do pedido</h2><br>  
  
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

    $carrinho = ReceberCarrinho();
    session_destroy();

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
      </div><hr>';
      foreach ($carrinho as $item) {
        echo '<div class="row">
        <div class="col">'.$item['nome'].'</div>
        <div class="col">'.$item['descricao'].'</div>
        <div class="col">R$ '.$item['preco'].'</div>
        <div class="col">'.$item['tamanho'].'</div>
        <div class="col">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        '.$item['quantidade'].'</div>
        </div><hr>';
      }
    }
    ?>
    <br>
  <h2> Endereço</h2><hr>  
  <?php 
  require_once("../PagUsuario/PerfilCtrl.php");
  $dados = PegardadosCtrl($login);
  ?>  
  <h2>Município: <?php echo $dados['Municipio']; ?></h2>
  <h2>Rua: <?php echo $dados['Rua']; ?></h2>
  <h2>Complemento: <?php echo $dados['Complemento']; ?></h2>
  <br>
  <h2>Informações do cliente </h2><hr>
  <h2>Nome: <?php echo $dados['nome']; ?></h2>
  <h2>Telefone: <?php echo $dados['telefone']; ?></h2>
  <h2>Forma de pagamento: <?php echo $_GET['formaPag']; ?> </h2>
  <br><hr>
  <center><h2 class="alert alert-warning">Para cancelar o pedido ligue para  a loja!</h2></center>
  </div>
  </div>
  
  <!--Rodapé -->
  <nav class="navbar bg-dark navbar-dark fixed-bottom">
    <div class="container">
      <span class="text-muted">Até que enfim foi</span>
  </nav>

</body>
</html>