
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
    .alert {
      margin-bottom: 8px !important;
    }

    .popover {
      max-width: 100% !important;
    }

    nav{
      background-color: white;
    }

    .nav-link{
      color: red;
    }

    .dropdown-item{
      color: rgb(159,1,1);
    }

    .nav-link:hover{
      color: rgb(159,1,1);
    }

    .dropdown-item:hover{
      color: rgb(159,1,1);
    }

    .carrinho:hover{
      border-radius:50%;
      box-shadow: 0 0 2px green;  
    }

    .navbar-toggler-icon:hover{
      border-radius:50%;
      box-shadow: 0 0 3px green;  
    }

    footer{
      position:relative;
      bottom:0;
      width:100%;
      background-color: white;
      color: #6c757d;
      margin-top:100px;
    }
      </style>

      <script>
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
  <nav class="navbar navbar-expand-sm bg navbar fixed-top border-bottom">
      <!-- Logo -->
      <a class="navbar-brand" href="../Inicial/index.php">
              <img src="../Imagens/favatto.png" alt="Logo" style="width: 50px">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <img src="../Imagens/menu.png" class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <!-- Links -->
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link" href="../Inicial/index.php">Menu</a>
        </li>
        <li class="nav-item">
              <a class="nav-link" href="pagfotosView.php">Fotos</a>
        </li>
        <!-- O carrinho de compras popover -->
        <li class="nav-item">
          <img src="../Imagens/carrinho.png" style="width:40px" class="carrinho" data-toggle="popover" data-popover-content="#a1" data-placement="top">
          <div id="a1" class="invisible" style="width: 0px; height: 0px;">
            <div class="popover-heading">
              Carrinho de compras
            </div>
            <div id="carrinho" class="popover-body">
            <?php
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
                 <div class="col">'.$item['quantidade'].'</div>
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

    session_start();
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
          <a class="dropdown-item" href="../PagUsuario/PerfilView.php">Seu perfil</a>';
          require_once("../PagUsuario/PerfilCtrl.php");
          $dados = PegardadosCtrl($login);
          if($dados['adm']){
            echo '<a class="dropdown-item" href="../PagHistorico/HistoricoViewA.php">Lista de Pedidos</a>';
          }else{    
            echo '<a class="dropdown-item" href="../PagHistorico/HistoricoViewC.php">Histórico de compras</a>';
          }
           echo' </div>
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

  <div class="container-fluid" style="margin-top:100px;">
  <br>
  <h1 style="text-align:center;">Galeria de Fotos</h1>
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
<footer class="page-footer pt-4 border-top">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            Endereço: Av. Getúlio de Moura, 152 - Jardim Metropole, São João de Meriti - RJ<br> Telefone: 21 98186-7762<br><br>
          <div class="row">
            <div class="col">
            <h5> Siga nos</h5>
            <a href="https://www.facebook.com/favattosportugal">
                <img  src="../Imagens/facebook.png" style="width:30px">
            </a>
            <a href="https://www.instagram.com/favattosportugal">
                <img  src="../Imagens/instagram.png" style="width:30px; margin-left: 10px;">
            </a>
            </div>
          </div>
          </div>
          <div class="col-md-2">
                <h5 class="text-md-right">Fale conosco</h5>
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
                        <input type ="submit" class="btn btn-outline-success">
                    </fieldset>
                </form>
            </div>
        </div>
      </div>
  </footer>

</body>
</html>