<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel ="stylesheet" href ="../Estilo/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <script src="../Estilo/jquery.min.js"></script> <script src="../Estilo/popper.min.js"></script> 
    <script src ="../Estilo/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script> 
    <script src="../Funcoes/ScriptInput.js"></script>
    <style>
    label{
      color: black;
    }

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

    .navbar-brand{
      color:green;
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

    .navbar-brand:hover{
      color:green;
    }
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-sm bg navbar fixed-top border-bottom">
  <!-- Logo -->
  <a class="navbar-brand" href="../Inicial/index.php">
              <img src="../Imagens/favatto.png" alt="Logo" style="width: 50px">
              Favatto`s Portugal
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
          <a class="nav-link" href="../Fotos/pagfotosView.php">Fotos</a>
    </li>
    <li class="nav-item">
          <img src="../Imagens/carrinho.png" style="width:40px" class="carrinho" data-toggle="popover" data-popover-content="#a1" data-placement="top">
          <div id="a1" class="invisible" style="width: 0px; height: 0px;">
            <div class="popover-heading">
              Carrinho de compras
            </div>
            <div id="carrinho" class="popover-body">
            <?php
             $url = $_SERVER["REQUEST_URI"];
             $_SESSION['url'] = $url;
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

      <div class ="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class ="navbar-nav ml-auto">
      <li class="nav-item">
       <a class="nav-link" href="../Cadastro/CadastroView.php">Cadastrar</a> 
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../Login/LoginView.php">Entrar</a> 
      </li>
      
      </ul>
        </div>
    <!-- fim da barra de navegação aqui -->
  </nav>
    <!-- Inicio de formulario -->
  
  <div class="container" style="margin-top: 150px; width:500px"> 
  <div class="shadow p-3 mb-5 bg-white rounded">

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
    
    <form id="cadastro" method="POST" action="LoginCtrl.php">
    <h3>Login</h3>
    <br> 
    <div class="form-group">
    <input type ="text" name ="emailLogin" id="emailLogin" class="form-control" placeholder="Email ou Login" size="29px" required>
    </div>
    <div class="form-group">
    <input type ="password" name="senha" id="senha" class="form-control" placeholder="Senha" size="29px" onkeypress= "return senhaLogin();" required>
    </div>
    <input type ="submit" name ="Entrar" value ="Entrar" class=" btn btn-outline-success" id="botao" style="width:100%"> <br> <br>
    <br>
    <center>Ainda não tem uma conta? <a href="../Cadastro/CadastroView.php" style ="color:green">Cadastre-se agora.</a> </center>  
    </form>
    </div>
    </div>
    <!-- fim de formulario -->
</body>
</html>