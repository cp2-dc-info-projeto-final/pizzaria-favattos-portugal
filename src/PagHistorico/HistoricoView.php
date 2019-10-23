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
    <script src="../Funcoes/ScriptInput.js"></script>
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
      <a class="nav-link" href="#">Nossa Gastronomia</a>
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
  <?php
  session_start();
  require_once("HistoricoModel.php");
  $historico = recuperarHistorico();
  foreach($historico as $row) {
  ?>
    <tr>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['diahora']?></td>
      <td><?php echo $row['precototal']?></td>
      <td><?php echo $row['formaPag']?></td>
      <td><?php echo $row['nome']?></td>
      <td><?php echo $row['telefone']?></td>
      <td><?php echo $row['produto']?></td>
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