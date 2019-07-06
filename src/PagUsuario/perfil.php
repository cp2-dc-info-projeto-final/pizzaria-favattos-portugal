<!DOCTYPE html>
<html>
<head>
    <title>Perfil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Estilo/Perfil.css">
    <link rel ="stylesheet" href ="../Estilo/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <script src="../Estilo/jquery.min.js"></script>
    <script src="../Estilo/popper.min.js"></script>
    <script src ="../Estilo/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
  require_once("../Funcoes/CriaConexao.php");
  
  $con = CriaConexao();
  

  ?>
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
      <li class="nav-item">
        <a class="nav-link" href="#">Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Nossa Gastronomia</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="#">Fotos</a>
      </li>
      <!-- Dropdown !-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Usuário
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Link 1</a>
          <a class="dropdown-item" href="#">Link 2</a>
          <a class="dropdown-item" href="#">Link 3</a>
        </div>
      </li>
    </ul>
    </div>
  </nav>  


  <div class="container" style="margin-top: 180px">
  <div class="shadow p-3 mb-5 bg-white rounded">

    <h1>Seus dados</h1>
    <h2>Nome: João Souza</h2>
    <h2>Idade: 16</h2>
    <h2>Email: jguilhermepasco@gmail.com</h2>
 
    <hr>
    <h1>Outras Informações</h1>
    <h2>Endereço: Exemplo de Endereço bem aqui!</h2>
    <h2>Telefone: 4002-8922</h2>
    <h2>Login: exemplologin</h2>
    <h2>Sexo: Masculino</h2>
  
  <hr>
  <center>
    <a class="btn btn-outline-success" href="Editar.php">Editar Perfil</a>
    <a class="btn btn-outline-danger" href="Sair.php">Sair</a>
  </center>
  </div>
  </div>
 
  <nav class="navbar bg-dark navbar-dark fixed-bottom">
    <div class="container">
      <span class="text-muted">Até que enfim foi</span>
    </nav>
    

</body>
</html>