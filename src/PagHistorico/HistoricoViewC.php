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
              <a class="nav-link" href="#">Fotos</a>
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
<div class="shadow p-3 mb-5 bg-white rounded">
<br>
<table>
  <?php
  require_once("HistoricoCtrl.php");
  require_once("../PagUsuario/PerfilCtrl.php");
  $dados = PegardadosCtrl($login);
  $historico = recuperarHistoricoCCtrl($dados['id']);
  if(count($historico) < 1){
  ?>
  <center><h2 class="alert alert-warning">Nenhum pedido foi efetuado até o momento!</h2></center>
  <?php
  }else{
  foreach($historico as $row) {
  ?>
  <table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">Número do pedido</th>
      <th scope="col">Horário</th>
      <th scope="col">Valor</th>
      <th scope="col">Forma de pagamento</th>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Endereço</th>
      <th scope="col">Produto</th>
      <th scope="col">Quantidade</th>
      

    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['diahora']?></td>
      <td><?php echo ''.$row['precototal'] .' R$ '. ''?></td>
      <td><?php echo $row['formaPag']?></td>
      <td><?php echo $row['nome']?></td>
      <td><?php echo $row['telefone']?></td>
      <td><?php echo ''.$row['Rua'] .' / '. $row['Municipio'] .' / '. $row['Complemento'].''?></td>
      <td><?php echo $row['produto']?></td>
      <td><?php echo $row['qtd']?></td>

    </tr>
  <?php
  }
  }
  ?>
  </table>

</div>
</div>
<!--Rodapé no final da página-->
<nav class="navbar bg-dark navbar-dark fixed-bottom"> 
<div class="container"> 
<span class="text-muted">Até que enfim foi</span> 
</nav> 
</body> 
</html>