<!doctype html>
<html>

<head>
  <title> Menu </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../Estilo/Perfil.css">
  <link rel="stylesheet" href="../Estilo/bootstrap-4.1.3-dist/css/bootstrap.min.css">
  <script src="../Estilo/jquery.min.js"></script>
  <script src="../Estilo/popper.min.js"></script>
  <script src="../Estilo/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
  <script src="../Funcoes/ScriptInput.js"></script>

  <style>
    .alert {
      margin-bottom: 8px !important;
    }

    .popover {
      max-width: 100% !important;
    }
  </style>

  <script>
    //Envia as informações dos produtos pela URL para o arquivo AdicionarCarrinhoCtrl
    function adicionar_carrinho(id, nome, tamanho, preco, descricao) {
      window.location.replace("AdicionarCarrinhoCtrl.php?id=" + id + "&nome=" + nome + "&tamanho=" + tamanho + "&preco=" + preco + "&descricao=" + descricao + "&op=" + 0);
    }

    function excluir_prod(id){
      if(confirm("Você tem certeza que deseja apagar esse produto?"))
      {
        window.location.replace("../EditarProduto/DeletarP.php?id="+id);
      }
    }
    
    //Função para ativar o popover e inseriro seu titulo e corpo
    $(function() {
      $("[data-toggle=popover]").popover({
        container: 'body',
        html: true,
        content: function() {
          var content = $(this).attr("data-popover-content");
          return $(content).children(".popover-body").html();
        },
        title: function() {
          var title = $(this).attr("data-popover-content");
          return $(title).children(".popover-heading").html();
        }
      });
    });
  </script>

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
          <a class="nav-link" href="../Fotos/pagfotosView.php">Fotos</a>
        </li>
        <!-- O carrinho de compras popover -->
        <li class="nav-item">
          <a href="#" class="btn btn-primary" data-toggle="popover" data-popover-content="#a1" data-placement="top">Carrinho</a>
          <div id="a1" class="invisible" style="width: 0px; height: 0px;">
            <div class="popover-heading">
              Carrinho de compras
            </div>
            <div id="carrinho" class="popover-body">
            <?php
             session_start();
             require_once "CarrinhoCtrl.php";
             $ctrl = new CarrinhoCtrl();
             $carrinho = $ctrl->getCarrinho($_SESSION);
         
             if(count($carrinho) == null){
               echo 'Carrinho vazio, favor adicionar produtos aqui... rs';
             }
             else{
               foreach ($carrinho as $item) {
                 echo '<div class="row">
                 <div class="col">'.$item['nome'].'</div>
                 <div class="col">'.$item['descricao'].'</div>
                 <div class="col">R$ '.$item['preco'].'</div>
                 <div class="col">'.$item['tamanho'].'</div>
                 <div class="col">
                 <a href="../Inicial/AdicionarCarrinhoCtrl.php?id='.$item['id'].'&nome='.$item['nome'].'&tamanho='.$item['tamanho'].'&preco='.$item['preco'].'&descricao='.$item['descricao'].'&op=1">+</a>
                 '.$item['quantidade'].'
                 <a href="../Inicial/AdicionarCarrinhoCtrl.php?id='.$item['id'].'&nome='.$item['nome'].'&tamanho='.$item['tamanho'].'&preco='.$item['preco'].'&descricao='.$item['descricao'].'&op=2">-</a>
                 </div>
                 <div class="col"><a  class="btn btn-info" href="RemoverCarrinhoCtrl.php?id='.$item['id'].'&tamanho='.$item['tamanho'].'">Remover</a></div>
                 </div> <hr>';
               }
             echo '<br><a class="btn btn-danger" href="../FinalizarPedido/FinalizarPedidoView.php">Finalizar pedido</a>';
             }
              ?>
            </div>
          </div>
        </li>
      </ul>
    </div>

    <!-- Entrar e cadastrar na direita -->
    <?php

      
    if (!isset($_SESSION["logi"])) {
      echo '
      <div class ="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class ="navbar-nav ml-auto">
      <li class="nav-item">
       <a class="nav-link" href="../Cadastro/CadastroView.php">Cadastrar</a> 
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../Login/LoginView.php">Entrar</a> 
      </li>
      </ul>
        </div>';
    } else {
      $login = $_SESSION["logi"];
      echo '
      <div class ="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class ="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle ml-auto" href="#" id="navbardrop" data-toggle="dropdown">
          Usuário
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="../PagUsuario/PerfilView.php">Seu perfil</a>
          <a class="dropdown-item" href="../PagHistorico/HistoricoViewC.php">Histórico de compras</a>
        </div>
      </li>
      </ul>
      </div>';
    }
    ?>

    <!-- fim da barra de navegação aqui -->
  </nav>

  <div class="container-fluid" style="margin-top: 100px;">
    <br>
    <!-- Caixa de erros -->
    <?php
      if (isset($_REQUEST['erros'])) {
        $erros = $_REQUEST['erros'];
        foreach (explode("|", $erros) as $erros_item) {
          ?>
          <div class="alert alert-danger" role="alert">
          <?php
          print($erros_item . ".");
          ?>
          </div>
          <?php
        }
      }
      
    ?>

    <!-- Inicio do menú com os mais pedidos -->
    <h1 style="text-align: center">Mais pedidos </h1>
    <hr>
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

    <!-- Listagem das pizzas organizados em cards por meio da função php listarProdutos() e a chamada da função javascript adicionar_carrinho dentro do botão que contem o preço-->
    <h1 style="text-align: center">Pizzas </h1>
    <hr>
    <div class="row justify-content-center">
      <?php
      require_once("ctrl.php");
      $produtos = listarProdutos(1);

      foreach ($produtos as $produto) {

        ?>
        <div class="col-md-4" style="max-width: 777px;">
          <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
            <div class="card-body">
              <h6> <?php echo $produto['nome']; ?> </h6>
              <p class="card-text"><?php echo $produto['descricao']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn">

                  <?php
                    require_once("../PagUsuario/PerfilCtrl.php");

                    if (isset($login)) {
                      $dados = PegardadosCtrl($login);
                      if ($dados['adm']) {

                        ?>
                      <a class="btn btn-bg btn-outline-danger" href="../EditarProduto/EditarPView.php?id=<?php echo $produto["id"]?>&categoria=1">Editar</a>
                      <a class="btn btn-bg btn-outline-danger" href="../CriarProd/CriarProdView.php">Criar novo produto</a>
                      <button class="btn btn-bg btn-outline-danger" onclick="excluir_prod(<?php echo $produto['id']?>)">Excluir</button>                      
                      <?php
                      } 
                      else{
                      ?>
                        <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>', 'grande', <?php echo $produto['preco_grande'] ?>, '<?php echo $produto['descricao'] ?>' );"><?php echo "Grande: R$" . $produto['preco_grande'] ?></button>
                        <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>','gigante', <?php echo $produto['preco_gigante'] ?>, '<?php echo $produto['descricao'] ?>' );"><?php echo "Gigante: R$" . $produto['preco_gigante'] ?></button>
                      <?php
                      }
                    }
                    elseif (!isset($login) || !$dados['adm']) {
                      ?>
                    <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>', 'grande', <?php echo $produto['preco_grande'] ?>, '<?php echo $produto['descricao'] ?>' );"><?php echo "Grande: R$" . $produto['preco_grande'] ?></button>
                    <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>','gigante', <?php echo $produto['preco_gigante'] ?>, '<?php echo $produto['descricao'] ?>' );"><?php echo "Gigante: R$" . $produto['preco_gigante'] ?></button>
                    <?php
                    }
                    ?>

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

    <!-- Listagem dos lanches organizados em cards por meio da função php listarProdutos() e a chamada da função javascript adicionar_carrinho dentro do botão que contem o preço-->
    <h1 style="text-align: center">Lanches </h1>
    <hr>
    <div class="row justify-content-center">
      <?php
      require_once "ctrl.php";
      $produtos = listarProdutos(2);

      foreach ($produtos as $produto) {

        ?>
        <div class="col-md-4" style="max-width: 777px;">
          <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="<?php $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
            <div class="card-body">
              <h6> <?php echo $produto['nome']; ?> </h6>
              <p class="card-text"><?php echo $produto['descricao']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn">

                  <?php
                    if (isset($login)) {

                      if ($dados['adm']) {
                  ?>
                      <a class="btn btn-bg btn-outline-danger" href="../EditarProduto/EditarPView.php?id=<?php echo $produto["id"]?>&categoria=1">Editar</a>
                      <a class="btn btn-bg btn-outline-danger" href="../CriarProd/CriarProdView.php">Criar novo produto</a>
                      <button class="btn btn-bg btn-outline-danger" onclick="excluir_prod(<?php echo $produto['id']?>)">Excluir</button>                  
                  <?php
                      } 
                      else {
                  ?>
                    <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>', '', <?php echo $produto['preco_normal'] ?>, '<?php echo $produto['descricao'] ?>' );"><?php echo "Preço: R$" . $produto['preco_normal'] ?></button>
                  <?php
                      }
                    }elseif (!isset($login) || !$dados['adm']) {
                  ?>
                    <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>', '', <?php echo $produto['preco_normal'] ?>, '<?php echo $produto['descricao'] ?>' );"><?php echo "Preço: R$" . $produto['preco_normal'] ?></button>
                  <?php
                    }
                  ?>

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

    <!-- Listagem das batatas organizados em cards por meio da função php listarProdutos() e a chamada da função javascript adicionar_carrinho dentro do botão que contem o preço-->
    <h1 style="text-align: center">Batatas </h1>
    <hr>
    <div class="row justify-content-center">
      <?php
      require_once "ctrl.php";
      $produtos = listarProdutos(4);

      foreach ($produtos as $produto) {

        ?>
        <div class="col-md-4" style="max-width: 777px;">
          <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
            <div class="card-body">
              <h6> <?php echo $produto['nome']; ?> </h6>
              <p class="card-text"><?php echo $produto['descricao']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn">
                  <?php
                    if (isset($login) && $dados['adm']) {
                  ?>
                      <a class="btn btn-bg btn-outline-danger" href="../EditarProduto/EditarPView.php?id=<?php echo $produto["id"]?>&categoria=1">Editar</a>
                      <a class="btn btn-bg btn-outline-danger" href="../CriarProd/CriarProdView.php">Criar novo produto</a>
                      <button class="btn btn-bg btn-outline-danger" onclick="excluir_prod(<?php echo $produto['id']?>)">Excluir</button>       
                    <?php
                    } elseif (!isset($login) || !$dados['adm']) {
                      if ($produto['nome'] == 'Batata frita') { ?>
                      <button type="button" class="btn btn-bg btn-outline-danger" style="margin: 5px 5px auto auto" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>', 'pequena', <?php echo $produto['preco_normal'] ?>, '<?php echo $produto['descricao'] ?>');"><?php echo "Pequena: R$" . $produto['preco_normal'] ?></button>
                      <button type="button" class="btn btn-bg btn-outline-danger" style="margin: 5px 5px auto 2px" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>', 'media', <?php echo $produto['preco_medio'] ?>, '<?php echo $produto['descricao'] ?>');"><?php echo "Média: R$" . $produto['preco_medio'] ?></button><br>
                      <button type="button" class="btn btn-bg btn-outline-danger" style="margin: 5px 5px auto 18px" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>', 'grande', <?php echo $produto['preco_grande'] ?>, '<?php echo $produto['descricao'] ?>');"><?php echo "Grande: R$" . $produto['preco_grande'] ?></button>
                      <button type="button" class="btn btn-bg btn-outline-danger" style="margin: 5px 5px auto 13px" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>', 'gigante', <?php echo $produto['preco_gigante'] ?>, '<?php echo $produto['descricao'] ?>');"><?php echo "Gigante: R$" . $produto['preco_gigante'] ?></button>
                    <?php } else { ?>
                      <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>', 'medio', <?php echo $produto['preco_medio'] ?>, '<?php echo $produto['descricao'] ?>');"><?php echo "Média: R$" . $produto['preco_medio'] ?></button>
                      <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>', 'grande', <?php echo $produto['preco_grande'] ?>, '<?php echo $produto['descricao'] ?>');"><?php echo "Grande: R$" . $produto['preco_grande'] ?></button>
                      <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>', 'gigante', <?php echo $produto['preco_gigante'] ?>, '<?php echo $produto['descricao'] ?>');"><?php echo "Gigante: R$" . $produto['preco_gigante'] ?></button>
                  <?php }
                    } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php
      }
      ?>

    </div>

    <!-- Listagem das bebidas organizados em cards por meio da função php listarProdutos() e a chamada da função javascript adicionar_carrinho dentro do botão que contem o preço-->
    <h1 style="text-align: center">Bebidas </h1>
    <hr>
    <div class="row justify-content-center">
      <?php
      require_once "ctrl.php";
      $produtos = listarProdutos(5);

      foreach ($produtos as $produto) {

        ?>
        <div class="col-md-4" style="max-width: 777px;">
          <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
            <div class="card-body">
              <h6> <?php echo $produto['nome']; ?> </h6>
              <p class="card-text"><?php echo $produto['descricao']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn">
                  <?php
                    if (isset($login) && $dados['adm']) {
                      ?>
                      <a class="btn btn-bg btn-outline-danger" href="../EditarProduto/EditarPView.php?id=<?php echo $produto["id"]?>&categoria=1">Editar</a>
                      <a class="btn btn-bg btn-outline-danger" href="../CriarProd/CriarProdView.php">Criar novo produto</a>
                      <button class="btn btn-bg btn-outline-danger" onclick="excluir_prod(<?php echo $produto['id']?>)">Excluir</button>      
                  <?php
                    } elseif (!isset($login) || !$dados['adm']) {
                      ?>
                    <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>', '', <?php echo $produto['preco_normal'] ?>, '<?php echo $produto['descricao'] ?>' );"><?php echo "Preço: R$" . $produto['preco_normal'] ?></button>
                    <?php } else { ?>
                    <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>', '', <?php echo $produto['preco_normal'] ?>, '<?php echo $produto['descricao'] ?>' );"><?php echo "Preço: R$" . $produto['preco_normal'] ?></button>
                  <?php } ?>
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

    <!-- Listagem dos combos organizados em cards por meio da função php listarProdutos() e a chamada da função javascript adicionar_carrinho dentro do botão que contem o preço-->
    <h1 style="text-align: center">Combos </h1>
    <hr>
    <div class="row justify-content-center">
      <?php
      require_once "ctrl.php";
      $produtos = listarProdutos(3);

      foreach ($produtos as $produto) {

        ?>
        <div class="col-md-4" style="max-width: 777px;">
          <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
            <div class="card-body">
              <h6> <?php echo $produto['nome']; ?> </h6>
              <p class="card-text"><?php echo $produto['descricao']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn">
                  <?php
                    if (isset($login) && $dados['adm']) {
                  ?>
                      <a class="btn btn-bg btn-outline-danger" href="../EditarProduto/EditarPView.php?id=<?php echo $produto["id"]?>&categoria=1">Editar</a>
                      <a class="btn btn-bg btn-outline-danger" href="../CriarProd/CriarProdView.php">Criar novo produto</a>
                      <button class="btn btn-bg btn-outline-danger" onclick="excluir_prod(<?php echo $produto['id']?>)">Excluir</button>                        
                  <?php
                    } elseif (!isset($login) || !$dados['adm']) {
                  ?>
                    <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>', '', <?php echo $produto['preco_normal'] ?>, '<?php echo $produto['descricao'] ?>' );"><?php echo "Preço: R$" . $produto['preco_normal'] ?></button>
                  <?php } else { ?>
                    <button type="button" class="btn btn-bg btn-outline-danger" onclick="adicionar_carrinho(<?php echo $produto['id'] ?>,'<?php echo $produto['nome'] ?>', '', <?php echo $produto['preco_normal'] ?>, '<?php echo $produto['descricao'] ?>' );"><?php echo "Preço: R$" . $produto['preco_normal'] ?></button>
                  <?php  
                    }
                  ?>
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

  <!--Rodapé no final da página-->
  <nav class="navbar bg-dark navbar-dark bottom">
    <div class="container">
      <span class="text-muted">Até que enfim foi</span>
  </nav>
</body>

</html>