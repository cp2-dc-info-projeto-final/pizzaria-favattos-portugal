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

    <script> 

    function adicionar_carrinho(id,tamanho,preco) {
      window.location.replace("AdicionarCarrinhoCtrl.php?id=" + id + "&tamanho=" + tamanho + "&preco=" + preco);
    }
   
    </script>

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

  <div id="carrinho">
  <?php 

    require_once "CarrinhoCtrl.php";

    $ctrl = new CarrinhoCtrl();

    $carrinho = $ctrl->getCarrinho();
    foreach ($carrinho as $item) {
      echo $item['id'];
      echo "<br>";
      if (array_key_exists('tamanho', $item)) {
        echo $item['tamanho'];
        echo "<br>";
      }
      echo $item['preco'];
      echo "<br>";
      echo $item['quantidade'];
      echo "<br>";
    }
  ?>
  </div>

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
    <?php
        require_once "ctrl.php";
        $produtos = listarProdutos(1);
        
        foreach ($produtos as $produto) {
        
    ?>
    <div class="col-md-4" style="max-width: 777px;">
        <div class="card mb-4 shadow-sm">
          <img class="card-img-top" src="<?php echo $produto['imagem'];?>" alt="<?php echo $produto['nome']; ?>">
          <div class="card-body">
            <h6> <?php echo $produto['nome']; ?> </h6>
            <p class="card-text"><?php echo $produto['descricao']; ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn">
                <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id']?>, 'grande', <?php echo $produto['preco_grande']?>);"><?php echo "Grande: R$".$produto['preco_grande']?></button>
                <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id']?>, 'gigante', <?php echo $produto['preco_gigante']?>);"><?php echo "Gigante: R$".$produto['preco_gigante']?></button>
              </div>
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
    <?php
        require_once "ctrl.php";
        $produtos = listarProdutos(2);
        
        foreach ($produtos as $produto) {
        
    ?>
    <div class="col-md-4" style="max-width: 777px;">
        <div class="card mb-4 shadow-sm">
          <img class="card-img-top" src="<?php echo $produto['imagem'];?>" alt="<?php echo $produto['nome']; ?>">
          <div class="card-body">
            <h6> <?php echo $produto['nome']; ?> </h6>
            <p class="card-text"><?php echo $produto['descricao']; ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn">
                <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id']?>,'',<?php echo $produto['preco_normal']?>);"><?php echo "Preço: R$".$produto['preco_normal']?></button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <?php
        }
    ?>
</div>
<br>

<h1 style="text-align: center">Batatas </h1><hr>
<div class="row">
<?php
        require_once "ctrl.php";
        $produtos = listarProdutos(4);
        
        foreach ($produtos as $produto) {
        
    ?>
    <div class="col-md-4" style="max-width: 777px;">
        <div class="card mb-4 shadow-sm">
          <img class="card-img-top" src="<?php echo $produto['imagem'];?>" alt="<?php echo $produto['nome']; ?>">
          <div class="card-body">
            <h6> <?php echo $produto['nome']; ?> </h6>
            <p class="card-text"><?php echo $produto['descricao']; ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn">
                <?php if($produto['nome'] == 'Batata frita'){ ?>
                <button type="button" class="btn btn-bg btn-outline-danger" style="margin: 5px 5px auto auto" onclick="adicionar_carrinho(<?php echo $produto['id']?>, 'pequena', <?php echo $produto['preco_normal']?>);"><?php echo "Pequena: R$".$produto['preco_normal']?></button>
                <button type="button" class="btn btn-bg btn-outline-danger" style="margin: 5px 5px auto 2px" onclick="adicionar_carrinho(<?php echo $produto['id']?>, 'media', <?php echo $produto['preco_medio']?>);"><?php echo "Média: R$".$produto['preco_medio']?></button><br>
                <button type="button" class="btn btn-bg btn-outline-danger" style="margin: 5px 5px auto 18px" onclick="adicionar_carrinho(<?php echo $produto['id']?>, 'grande', <?php echo $produto['preco_grande']?>);"><?php echo "Grande: R$".$produto['preco_grande']?></button>
                <button type="button" class="btn btn-bg btn-outline-danger" style="margin: 5px 5px auto 13px" onclick="adicionar_carrinho(<?php echo $produto['id']?>, 'gigante', <?php echo $produto['preco_gigante']?>);"><?php echo "Gigante: R$".$produto['preco_gigante']?></button>
                <?php } else{?>
                <button type="button" class="btn btn-bg btn-outline-danger"><?php echo "Média: R$".$produto['preco_medio']?></button>
                <button type="button" class="btn btn-bg btn-outline-danger"><?php echo "Grande: R$".$produto['preco_grande']?></button>
                <button type="button" class="btn btn-bg btn-outline-danger"><?php echo "Gigante: R$".$produto['preco_gigante']?></button>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
    </div>
    <?php
        }
    ?>

</div>

<h1 style="text-align: center">Bebidas </h1><hr>
<div class="row">
<?php
        require_once "ctrl.php";
        $produtos = listarProdutos(5);
        
        foreach ($produtos as $produto) {
        
    ?>
    <div class="col-md-4" style="max-width: 777px;">
        <div class="card mb-4 shadow-sm">
          <img class="card-img-top" src="<?php echo $produto['imagem'];?>" alt="<?php echo $produto['nome']; ?>">
          <div class="card-body">
            <h6> <?php echo $produto['nome']; ?> </h6>
            <p class="card-text"><?php echo $produto['descricao']; ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn">
                <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id']?>,'',<?php echo $produto['preco_normal']?>);" ><?php echo "Preço: R$".$produto['preco_normal']?></button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <?php
        }
    ?>
</div>
<br>

<h1 style="text-align: center">Combos </h1><hr>
<div class="row">
<?php
        require_once "ctrl.php";
        $produtos = listarProdutos(3);
        
        foreach ($produtos as $produto) {
        
    ?>
    <div class="col-md-4" style="max-width: 777px;">
        <div class="card mb-4 shadow-sm">
          <img class="card-img-top" src="<?php echo $produto['imagem'];?>" alt="<?php echo $produto['nome']; ?>">
          <div class="card-body">
            <h6> <?php echo $produto['nome']; ?> </h6>
            <p class="card-text"><?php echo $produto['descricao']; ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn">
                <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id']?>,'',<?php echo $produto['preco_normal']?>);"><?php echo "Preço: R$".$produto['preco_normal']?></button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <?php
        }
    ?>

</div>



</div>

<nav class="navbar bg-dark navbar-dark fixed-bottom"> 
<div class="container"> 
<span class="text-muted">Até que enfim foi</span> 
</nav> 
</body> 
</html>