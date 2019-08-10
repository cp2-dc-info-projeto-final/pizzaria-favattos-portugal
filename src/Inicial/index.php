<!doctype html> 
<html> 
  <head> 
      <title> Menu </title> 
      <meta charset="UTF-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
      <link rel="stylesheet" href="../Estilo/Perfil.css">
      <link rel ="stylesheet" href ="../Estilo/bootstrap-4.1.3-dist/css/bootstrap.min.css">
      <script src="../Estilo/jquery.min.js"></script> <script src="../Estilo/popper.min.js"></script> 
      <script src ="../Estilo/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script> 
      <script src="../Funcoes/ScriptInput.js"></script>
  </head> 
  
  <body>

  <?php
    if(count($_REQUEST) != 0){
      echo ('
        <br>
        <style>
        #Erros{
          visibility:visible;
          background-color: #ffff80;
          width: 50%;
          text-align: center;
          border: solid 1px;
          padding: 3px;
          font-size: 18px;
          top: 100px;
        }
        </style>
        ');
    }
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
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="../Inicial/index.php">Menu</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Pizzas</a>
        <a class="dropdown-item" href="#">Lanches</a>
        <a class="dropdown-item" href="#">Bebidas</a>
        <a class="dropdown-item" href="#">Combos</a>
      </div>  
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

<div class="container-fluid" style="margin-top: 100px;">
<h1 style="text-align: center">Mais pedidos </h1><hr>
<div class="row">
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        Uma fotinha com o preço e descrição.
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        Uma fotinha com o preço e descrição.
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        Uma fotinha com o preço e descrição.
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        Uma fotinha com o preço e descrição.
    </div>
    </div>
</div>
<br>

<h1 style="text-align: center">Pizzas </h1><hr>
<div class="row">
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da pizza</h5>
        Aqui é a descrição dessa pizza invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da pizza</h5>
        Aqui é a descrição dessa pizza invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da pizza</h5>
        Aqui é a descrição dessa pizza invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da pizza</h5>
        Aqui é a descrição dessa pizza invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da pizza</h5>
        Aqui é a descrição dessa pizza invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da pizza</h5>
        Aqui é a descrição dessa pizza invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da pizza</h5>
        Aqui é a descrição dessa pizza invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da pizza</h5>
        Aqui é a descrição dessa pizza invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da pizza</h5>
        Aqui é a descrição dessa pizza invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da pizza</h5>
        Aqui é a descrição dessa pizza invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da pizza</h5>
        Aqui é a descrição dessa pizza invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da pizza</h5>
        Aqui é a descrição dessa pizza invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
</div>
<br>

<h1 style="text-align: center">Lanches </h1><hr>
<div class="row">
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome do Lanche</h5>
        Aqui é a descrição desse Lanche invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome do Lanche</h5>
        Aqui é a descrição desse Lanche invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome do Lanche</h5>
        Aqui é a descrição desse Lanche invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome do Lanche</h5>
        Aqui é a descrição desse Lanche invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome do Lanche</h5>
        Aqui é a descrição desse Lanche invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome do Lanche</h5>
        Aqui é a descrição desse Lanche invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome do Lanche</h5>
        Aqui é a descrição desse Lanche invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome do Lanche</h5>
        Aqui é a descrição desse Lanche invisível, mas que pode ter certeza que o ingrediente principal é o amor
        </div>
        </div>
    </div>
    </div>
</div>
<br>

<h1 style="text-align: center">Bebidas </h1><hr>
<div class="row">
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da bebida</h5>
        Preço da bebida do lado da imagem
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da bebida</h5>
        Preço da bebida do lado da imagem
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da bebida</h5>
        Preço da bebida do lado da imagem
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da bebida</h5>
        Preço da bebida do lado da imagem
        </div>
        </div>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da bebida</h5>
        Preço da bebida do lado da imagem
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da bebida</h5>
        Preço da bebida do lado da imagem
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da bebida</h5>
        Preço da bebida do lado da imagem
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome da bebida</h5>
        Preço da bebida do lado da imagem
        </div>
        </div>
    </div>
    </div>
</div>
<br>

<h1 style="text-align: center">Combos </h1><hr>
<div class="row">
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome do Combo</h5>
        O que vem no combo e seu preço logo ao lado da foto (n sei se vai ter foto).
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome do Combo</h5>
        O que vem no combo e seu preço logo ao lado da foto (n sei se vai ter foto).
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome do Combo</h5>
        O que vem no combo e seu preço logo ao lado da foto (n sei se vai ter foto).
        </div>
        </div>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome do Combo</h5>
        O que vem no combo e seu preço logo ao lado da foto (n sei se vai ter foto).
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome do Combo</h5>
        O que vem no combo e seu preço logo ao lado da foto (n sei se vai ter foto).
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Nome do Combo</h5>
        O que vem no combo e seu preço logo ao lado da foto (n sei se vai ter foto).
        </div>
        </div>
    </div>
    </div>
</div>



</div>

<nav class="navbar bg-dark navbar-dark fixed-bottom"> 
<div class="container"> 
<span class="text-muted">Até que enfim foi</span> 
</nav> 
</body> 
</html>