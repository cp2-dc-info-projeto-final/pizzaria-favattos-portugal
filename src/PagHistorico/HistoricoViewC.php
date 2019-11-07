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

<!doctype html> 
<html> 
  <head> 
    <title> historico </title> 
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
              <a class="nav-link" href="../Fotos/pagfotosView.php">Fotos</a>
        </li>
      </ul>
    </div>
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
      </div>

    <!-- fim da barra de navegação aqui -->
  </nav>

  
<div class="container-fluid" style="margin-top: 100px;">
<br>
<center><h2>Histórico de pedidos </h2></center>
<hr>
  <?php
  require_once("HistoricoCtrl.php");
  require_once("../PagUsuario/PerfilCtrl.php");
  $dados = PegardadosCtrl($login);
  $historico = recuperarHistoricoCCtrl($dados['id']);
  foreach($historico as $row) {
  ?>
  <div class="shadow p-3 mb-5 bg-white rounded">
  <div class="row">
    <div class="col">
      <h3 style="font-size:22px"> Pedido </h3>
      <p>Número - <?php echo $row['id']?></p>
      <p>Realizado - <?php echo $row['diahora']?></p>
      <p>Status - <?php echo $row['estado']?></p>
    </div>
    <div class="col">
      <h3 style="font-size:22px"> Cliente </h3>
      <p><?php echo $row['usuario']?></p>
      <p>Telefone: <?php echo $row['telefone']?></p>
      <p>Endereço: <?php echo ''.$row['rua'] .' / '. $row['municipio'] .' / '. $row['complemento'].''?></p>
    </div>
    <div class="col-5">
      <h3 style="font-size:22px"> Resumo da compra </h3>
      <p><?php
            foreach ($row['itens'] as $item) {
              echo $item['produto'] . " " . $item['tamanho'] . "( R$ " . $item['preco'] . " )" . " x " .  $item['qtd'] ." unidade(s) </br>" ;
            }?>
      </p>
      <p>Forma de pagamento: <?php echo $row['formapag']?></p>
      <p>Total: <?php echo 'R$ '.$row['precototal'].''?></p>
    </div>
  </div>
  <?php
  }
  ?>

</div>
<!--Rodapé no final da página-->
<nav class="navbar bg-dark navbar-dark fixed-bottom"> 
<div class="container"> 
<span class="text-muted">Até que enfim foi</span> 
</nav> 
</body> 
</html>