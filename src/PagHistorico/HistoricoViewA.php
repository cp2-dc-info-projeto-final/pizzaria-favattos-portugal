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
<table>
  <?php
  session_start();
  require_once("HistoricoCtrl.php");
  $historico = recuperarHistoricoCtrl();
  foreach($historico as $row) {
  ?>
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
      <th scope="col">produto</th>
      <th scope="col">quantidade</th>
      

    </tr>
  </thead>
  <tbody>
    <tr>
    <th scope ="row"></th>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['diahora']?></td>
      <td><?php echo ''.$row['precototal'] .' R$ '. ''?></td>
      <td><?php echo $row['formaPag']?></td>
      <td><?php echo $row['nome']?></td>
      <td><?php echo $row['telefone']?></td>
      <td><?php echo ''.$row['Rua'] .' / '. $row['Municipio'] .' / '. $row['Complemento'].''?></td>
      <td><?php echo $row['cpf']?></td>
      <td><?php echo $row['produto']?></td>
      <td><?php echo $row['qtd']?></td>
      
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