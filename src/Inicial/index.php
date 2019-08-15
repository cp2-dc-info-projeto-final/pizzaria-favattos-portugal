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
    <?php
        require_once "ctrl.php";
        $produtos = listarProdutos("");
        
        foreach ($produtos as $produto) {
        
    ?>
    <div class="col-sm" style="display: inline-box">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
    <div class="media">
    <img class="mr-3" src="..." alt="Generic placeholder image">
    <div class="media-body">
        <h5 class="mt-0"><?php $produto["nome"] ?></h5>
        <span> <?php $produto["descricao"] ?> </span>
    </div>
    </div>
    </div>
    </div>
    <?php
        }
    ?>
</div>
<br>

<h1 style="text-align: center">Lanches </h1><hr>
<div class="row">
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Veneza</h5>
        Pão, carne, cheddar, presunto, calabresa, bacon, alface, tomate e cebola roxa.      
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Veneza duplo</h5>
        Pão, duas carnes, dois cheddar, dois presuntos, calabresa, bacon, alface, tomate, cebola roxa.        
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Veneza triplo</h5>
        Pão, três carnes, três cheddar, três presuntos, calabresa, bacon, alface, tomate e cebola roxa.        
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Viana</h5>
        Pão, carne, dois cheddar, bacon e calabresa.        
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
        <h5 class="mt-0">Viana duplo</h5>
        Pão, carne, duplo cheddar, carne, duplo cheddar, bacon e calabresa.        
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Viana triplo</h5>
        Pão, carne, duplo cheddar, carne, duplo cheddar, carne, duplo cheddar, bacon e calabresa.        
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Batata frita</h5>
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
        <h5 class="mt-0">Batata maluca</h5>
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
        <h5 class="mt-0">Água sem gás</h5>
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
        <h5 class="mt-0">Refrigerante 350ml</h5>
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
        <h5 class="mt-0">Coca-cola 350ml</h5>
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
        <h5 class="mt-0">Refrigerante 2L</h5>
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
        <h5 class="mt-0">Coca-cola 2L</h5>
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
        <h5 class="mt-0">Del Valle</h5>
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
        <h5 class="mt-0">Guaraviton 500ml</h5>
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
        <h5 class="mt-0">Guaracamp 285ml</h5>
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
        <h5 class="mt-0">Combo Veneza 1</h5>
        Veneza + Batata frita 50g + Refrigerante 350ml (Coca + 0.50 C) + 1 sachê de molho.        
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Combo Veneza 2</h5>
        Veneza duplo + Batata frita 50g + Refrigerante 350ml (Coca + 0.50 C) + 2 sachês de molho.        
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Combo Veneza 3</h5>
        2 Veneza Duplo + Batata frita (porção) + 2 Refrigerante 350ml (Coca + 0.50 C) + 2 sachês de molho.       
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
        <h5 class="mt-0">Combo Viana 1</h5>
        Viana + Batata frita 50g + Refrigerante 350ml (Coca + 0.50 C) + 1 sachê de molho.        
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Combo Viana 2</h5>
        Viana duplo + Batata frita 50g + Refrigerante 350ml (Coca + 0.50 C) + 2 sachês de molho.        
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Combo Viana 3</h5>
        2 Viana duplo + Batata frita (porção) + 2 Rfefrigerante 350ml (Coca + 0.50 C) + 2 sachês de molho.        
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