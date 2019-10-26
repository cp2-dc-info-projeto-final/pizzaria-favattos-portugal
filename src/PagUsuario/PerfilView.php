<?php
  session_start();

  if(!isset($_SESSION["logi"])){
    header("location: ../Login/LoginView.php");
    exit();
  }
  else{
    $login = $_SESSION["logi"];
  }


?>

<!DOCTYPE html>
<html>
<head>
    <title>Perfil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Estilo/Perfil.css">
    <link rel ="stylesheet" href ="../Estilo/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <script src="../Estilo/jquery.min.js"></script>
    <script src="../Estilo/popper.min.js"></script>
    <script src ="../Estilo/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
</head>
<body>

  <!-- Barra de navegação -->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <!-- Logo -->
      <a class="navbar-brand" href="#">
              <img src="bird.jpg" alt="Logo" style="width:40px;">
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
        <!-- O carrinho de compras popover -->
        <li class="nav-item">
          <a href="#" class="btn btn-primary" data-toggle="popover" data-popover-content="#a1" data-placement="top">Carrinho</a>
          <div id="a1" class="invisible" style="width: 0px; height: 0px;">
            <div class="popover-heading">
              Carrinho de compras
            </div>
            <div id="carrinho" class="popover-body">
            <?php
             session_start();
             require_once "CarrinhoCtrl.php";
             $ctrl = new CarrinhoCtrl();
             $carrinho = $ctrl->getCarrinho($_SESSION);
         
             if(count($carrinho) == null){
               echo 'Carrinho vazio, favor adicionar produtos aqui... rs';
             }
             else{
               foreach ($carrinho as $item) {
                 echo '<div class="row">
                 <div class="col">'.$item['nome'].'</div>
                 <div class="col">'.$item['descricao'].'</div>
                 <div class="col">R$ '.$item['preco'].'</div>
                 <div class="col">'.$item['tamanho'].'</div>
                 <div class="col">'.$item['quantidade'].'</div>
                 <div class="col"><a  class="btn btn-info" href="RemoverCarrinhoCtrl.php?id='.$item['id'].'&tamanho='.$item['tamanho'].'">Remover</a></div>
                 </div> <hr>';
               }
             echo '<br><a class="btn btn-danger" href="../FinalizarPedido/FinalizarPedidoView.php">Finalizar pedido</a>';
             }
              ?>
            </div>
          </div>
        </li>
      </ul>
    </div>

    <!-- Entrar e cadastrar na direita -->
    <?php

      
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
          <a class="dropdown-item" href="#">Histórico de compras</a>
        </div>
      </li>
      </ul>
      </div>';
    }
    ?>

    <!-- fim da barra de navegação aqui -->
  </nav>

 
  <!--Demonstrando dados do usário -->
 
  <div class="container" style="margin-top: 150px">
  <div class="shadow p-3 mb-5 bg-white rounded">
  <!-- caixa de erros -->
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
    require_once("PerfilCtrl.php");
    $dados = PegardadosCtrl($login);
    $idade = CalcularIdadeCtrl($dados);
    ?>

    <h1>Seus dados</h1>
    <h2>Nome: <?php echo $dados['nome']; ?></h2>
    <h2>Idade: <?php echo $idade; ?></h2>
    <h2>Email: <?php echo $dados['email']; ?></h2>
    <h2>Telefone: <?php echo $dados['telefone']; ?></h2>
    <h2>Sexo: <?php echo $dados['sexo']; ?></h2>
    <h2>Login: <?php echo $dados['logi']; ?></h2>
 
    <hr>
    <h1>Endereço</h1>
    <h2>Município: <?php echo $dados['Municipio']; ?></h2>
    <h2>Rua: <?php echo $dados['Rua']; ?></h2>
    <h2>Complemento: <?php echo $dados['Complemento']; ?></h2>
  
  <hr>
  <center>
    <a class="btn btn-outline-success" href="EditarView.php">Editar Perfil</a>
    <a class="btn btn-outline-danger" href="../Login/Sair.php">Sair</a>
  </center>
  </div>
  </div>
  
  <!--Rodapé -->
  <br><br>
<nav class="navbar bg-dark navbar-dark fixed-bottom"> 
<div class="container"> 
<span class="text-muted">Até que enfim foi</span> 
</nav> 

</body>
</html>