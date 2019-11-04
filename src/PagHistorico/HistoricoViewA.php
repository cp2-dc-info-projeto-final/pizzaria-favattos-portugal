<?php
  session_start();
  require_once("../PagUsuario/PerfilCtrl.php");

  if(!isset($_SESSION["logi"])){
    header("location: ../Login/LoginView.php");
    exit();
  }
  else{
    $login = $_SESSION["logi"];
    $dados = PegardadosCtrl($login);
    if(!$dados["adm"]){
      header("location: ../Inicial/index.php");
    }
  }

?>

<!doctype html> 
<html> 
  <head> 
    <title> historico </title> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="../Estilo/Perfil.css">
    <link rel ="stylesheet" href ="../Estilo/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <script src="../Estilo/jquery.min.js"></script> <script src="../Estilo/popper.min.js"></script> 
    <script src ="../Estilo/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script> 
  </head> 
  
  <body>
  <!-- Barra de navegação -->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <!-- Logo -->
  <a class="navbar-brand" href="#">
          <img src="bird.jpg" alt="Logo" style="width:40px;">
  </a>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item dropdown">
      <a class="nav-link" href="../Inicial/index.php">Menu</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../Fotos/pagfotosView.php">Fotos</a> 
    </li>
  <!-- Dropdown -->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      Usuário
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../PagUsuario/PerfilView.php">Seu perfil</a>
      <a class="dropdown-item" href="#">Histórico de compras</a>
    </div>
  </li>  
  </div>
  </nav> 

  
<div class="container-fluid" style="margin-top: 100px;">
<br>
<table>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">horário</th>
      <th scope="col">valor</th>
      <th scope="col">forma de pagamento</th>
      <th scope="col">nome</th>
      <th scope="col">telefone</th>
      <th scope="col">endereço</th>
      <th scope="col">cpf</th>
      <th scope="col">itens</th>
    

    </tr>
  </thead>
  <tbody>
  <?php
  session_start();
  require_once("HistoricoModel.php");
  $historico = recuperarHistorico();
  foreach($historico as $row) {
  ?>
    <tr>
    <th scope ="row"></th>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['diahora']?></td>
      <td><?php echo ''.$row['precototal'] .' R$ '. ''?></td>
      <td><?php echo $row['formapag']?></td>
      <td><?php echo $row['usuario']?></td>
      <td><?php echo $row['telefone']?></td>
      <td><?php echo ''.$row['rua'] .' / '. $row['municipio'] .' / '. $row['complemento'].''?></td>
      <td><?php echo $row['cpf']?></td>
      <td><?php
            foreach ($row['itens'] as $item) {
              echo $item['qtd'] . "x" . $item['produto'] . " " . $item['tamanho'] . "( R$ " . $item['preco'] . " )</br>" ;
            }?>
    </tr>
  <?php
  }
  ?>
  </table>


<!--Rodapé no final da página-->
<nav class="navbar bg-dark navbar-dark fixed-bottom"> 
<div class="container"> 
<span class="text-muted">Até que enfim foi</span> 
</nav> 
</body> 
</html>