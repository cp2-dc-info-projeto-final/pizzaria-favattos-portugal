<?php
  session_start();

  if(!isset($_SESSION["logi"])){
    header("location: ../Login/LoginView.php");
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
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Usuário
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Seu perfil</a>
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
      require_once("perfilModel.php");
      $dados = Pegardados($login);
      $idade = CalcularIdade($dados['data_nasc']);
    ?>

    <h1>Seus dados</h1>
    <h2>Nome: <?php echo $dados['nome']; ?></h2>
    <h2>Idade: <?php echo $idade; ?></h2>
    <h2>Email: <?php echo $dados['email']; ?></h2>
 
    <hr>
    <h1>Outras Informações</h1>
    <h2>Endereço: <?php echo $dados['endereco']; ?></h2>
    <h2>Telefone: <?php echo $dados['telefone']; ?></h2>
    <h2>Login: <?php echo $dados['logi']; ?></h2>
    <h2>Sexo: <?php echo $dados['sexo']; ?></h2>
  
  <hr>
  <center>
    <a class="btn btn-outline-success" href="EditarView.php">Editar Perfil</a>
    <a class="btn btn-outline-danger" href="../Login/Sair.php">Sair</a>
  </center>
  </div>
  </div>
  
  <!--Rodapé -->
  <nav class="navbar bg-dark navbar-dark fixed-bottom">
    <div class="container">
      <span class="text-muted">Até que enfim foi</span>
  </nav>

</body>
</html>