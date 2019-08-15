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

    <style>
    .alert {
    margin-bottom: 8px !important;
    }
    </style>
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
    <li class="nav-item dropdown">
      <a class="nav-link" href="../Inicial/index.php">Menu</a>
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
        <a class="dropdown-item" href="../PagUsuario/PerfilView.php">Seu perfil</a>
        <a class="dropdown-item" href="#">Histórico de compras</a>
        <a class="dropdown-item" href="#">Link 3</a>
      </div>
    </li>
  </ul>
  </div>
  </nav>  

<div class="container-fluid" style="margin-top: 100px;">
<br>
<!-- Caixa de erros -->
<?php
  foreach($_REQUEST as $item){
    foreach (explode("|", $item) as $item_item) {
?>
<div class="alert alert-danger" role="alert">
<?php
print($item_item . ".");
?>
</div>
<?php
  }
}
?>

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
        <h5 class="mt-0">Pizza Calabresa</h5>
        Muçarela, orégano, calabresa e cebola.
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Pizza Presunto</h5>
        Muçarela, orégano, presunto e cebola.
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Pizza Muçarela</h5>
        Muçarela e orégano.
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Pizza Mista</h5>
        Muçarela, orégano, calabresa, presunto, bacon, ovo, tomate e cebola.
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
        <h5 class="mt-0">Pizza Bacon com ovos</h5>
        Muçarela, orégano, bacon e ovo.
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Pizza Favatto`s Portugal</h5>
        Muçarela, orégano, calabresa, presunto, ovo, azeitona e cebola.        
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Pizza Salame</h5>
        Muçarela, orégano,Pizza  manjericão, queijo prato, queijo parmesão e salame.
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Pizza Frango com catupiry</h5>
        Muçarela, orégano, frango e catupiry.       
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
        <h5 class="mt-0">Pizza Hot dog</h5>
        Muçarela, orégano, molho, salsicha, batata palha e azeitona.       
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Pizza Portuguesa</h5>
        Muçarela, orégano, presunto, calabresa, cebola, ovo e azeitona.
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Pizza Marguerita</h5>
        Muçarela, orégano, tomate e manjericão.       
        </div>
        </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <div class="media">
        <img class="mr-3" src="..." alt="Generic placeholder image">
        <div class="media-body">
        <h5 class="mt-0">Pizza Banana com canela grande</h5>
        Muçarela, banana e canela.        
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