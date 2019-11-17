
    <html>
    <head>
      <meta charset="UTF-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
      <link rel="stylesheet" href="../Estilo/Perfil.css">
      <link rel ="stylesheet" href ="../Estilo/bootstrap-4.1.3-dist/css/bootstrap.min.css">
      <script src="../Estilo/jquery.min.js"></script> <script src="../Estilo/popper.min.js"></script> 
      <script src ="../Estilo/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script> 
      <script src="../Funcoes/ScriptInput.js"></script> 
      <style>
        body{
          background-image:url(../Imagens/imgfundo.jpg)
        }
      </style>
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
              <a class="nav-link" href="#">Fotos</a>
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
             require_once "../Inicial/CarrinhoCtrl.php";
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
                 <div class="col"><a  class="btn btn-info" href="../Inicial/RemoverCarrinhoCtrl.php?id='.$item['id'].'&tamanho='.$item['tamanho'].'">Remover</a></div>
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
          <a class="dropdown-item" href="#">Histórico de compras</a>
        </div>
      </li>
      </ul>
      </div>';
    }
    ?>

    <!-- fim da barra de navegação aqui -->
  </nav>

<div class="container" style="margin-top: 100px;">
<!-- caixa de erros -->
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

  <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0" style="color:white">Galeria de fotos </h1>
  <div class="container-fluid" style="margin-top:20px;">
  <h1 style="text-align:center;"><span style ="color:green">Fa</span><span style ="color:white">va</span><span style="color:red">tt</span><span style ="color:green">o</span><span style="color:white">'</span><span style="color:green">s</span>   <span style="color:white">Po</span><span style="color:red">rt</span><span style="color:green">ug</span><span style="color:white">al</span></h1><br>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <!--Onde cada foto é exebida ao clicar-->
      <div class="modal-dialog" role="document">
      <div class="modal-content-sm">
      <div class="modal-header-sm">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style ="margin-top:30%" >
        <a href="../Imagens/loja.jpg">
        <img class="img-fluid img-thumbnail" src="../Imagens/loja.jpg" alt="">
        <p><h5>APERTE ESC PARA FECHAR</h5></p> 
        </a>
      </div>
      </div>
      </div>
      </div>
    </div>
  <hr class="mt-2 mb-5">
  
  <!-- Imagens -->
  <div class="row text-center text-lg-left">

    <div class="col-lg-3 col-md-4 col-6">
            <img class="img-fluid img-thumbnail" src="../Imagens/loja.jpg" alt="" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 1rem">
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      
            <img class="img-fluid img-thumbnail" src="../Imagens/loja.jpg" alt="" data-toggle="modal" data-target="#exampleModal">
         
    </div>
    <div class="col-lg-3 col-md-4 col-6">
    
            <img class="img-fluid img-thumbnail" src="../Imagens/loja.jpg" alt="" data-toggle="modal" data-target="#exampleModal">
          
    </div>
    <div class="col-lg-3 col-md-4 col-6">
            <img class="img-fluid img-thumbnail" src="../Imagens/loja.jpg" alt="" data-toggle="modal" data-target="#exampleModal">
          
    </div>
    <div class="col-lg-3 col-md-4 col-6">
     
            <img class="img-fluid img-thumbnail" src="../Imagens/loja.jpg" alt="" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 1rem">
         
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      
            <img class="img-fluid img-thumbnail" src="../Imagens/loja.jpg" alt="" data-toggle="modal" data-target="#exampleModal">
          
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      
            <img class="img-fluid img-thumbnail" src="../Imagens/loja.jpg" alt="" data-toggle="modal" data-target="#exampleModal">
          
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      
            <img class="img-fluid img-thumbnail" src="../Imagens/loja.jpg" alt="" data-toggle="modal" data-target="#exampleModal">
          
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      
            <img class="img-fluid img-thumbnail" src="../Imagens/loja.jpg" alt="" data-toggle="modal" data-target="#exampleModal">
          
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      
            <img class="img-fluid img-thumbnail" src="../Imagens/loja.jpg" alt="" data-toggle="modal" data-target="#exampleModal">
         
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      
            <img class="img-fluid img-thumbnail" src="../Imagens/loja.jpg" alt="" data-toggle="modal" data-target="#exampleModal">
          
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      
            <img class="img-fluid img-thumbnail" src="../Imagens/loja.jpg" alt="" data-toggle="modal" data-target="#exampleModal">
          
    </div>
  </div>
</div>

<br><br>
<footer class="page-footer pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id felis in justo blandit egestas blandit nec nibh. Donec pellentesque nulla vel quam aliquam, sed posuere augue euismod. Quisque iaculis sit amet lectus eu accumsan. Nulla mattis mattis mauris, sed rutrum nulla molestie non. Mauris non interdum lacus, a varius lacus. Ut iaculis aliquet purus sed congue. Suspendisse egestas placerat arcu ut mattis. Cras mollis felis lorem, ac euismod justo sodales sit amet.</p>
          </div>
          <div class="col-md-2">
                <h5 class="text-md-right">Fale conosco</h5>
                <hr>
            </div>
            <div class="col-md-5">
                <form> 
                    <fieldset class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Seu email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                    </fieldset>
                    <fieldset class="form-group">
                        <textarea class="form-control" name="mensagem" id="mensagem" placeholder="Message" required></textarea>
                    </fieldset>
                    <fieldset class="form-group text-xs-right">
                        <input type ="submit" class="btn btn-primary">
                    </fieldset>
                </form>
            </div>
        </div>
      </div>
  </footer>

</body>
</html>