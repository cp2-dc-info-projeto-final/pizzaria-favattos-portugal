<?php
require_once("FinalizarPedidoCtrl.php");
$carrinho = ReceberCarrinho();

if (!isset($_SESSION["logi"]) || count($carrinho) == null) {
  header('Location: ../Inicial/index.php');
}
else{
  $login = $_SESSION["logi"];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pedido Realizado</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Estilo/Perfil.css">
    <link rel ="stylesheet" href ="../Estilo/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <script src="../Estilo/jquery.min.js"></script>
    <script src="../Estilo/popper.min.js"></script>
    <script src ="../Estilo/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <style>

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
</head>
<body>

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
          <a class="nav-link" href="../Fotos/pagfotosView.php">Fotos</a>
    </li>
      </ul>
    </div>
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
      </div>
   </nav>  

 
  <!--Demonstrando dados do usário -->
 
  <div class="container" style="margin-top: 150px">
  <div class="shadow p-3 mb-5 bg-white rounded">

  <div class="alert alert-success" role="alert">Pedido Realizado com sucesso!</div><br>
  <h2> Dados do pedido</h2><br>  
  
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
    
  <?php 
    session_unset($_SESSION["carrinho"]);
    $_SESSION["logi"] = $login;
      
    if(count($carrinho) == null){
      echo 'Carrinho vazio, favor adicionar produtos aqui... rs';
    }
    else{
      echo '<div class="row">
      <div class="col"><b>Produto</b></div>
      <div class="col"><b>Descrição</b></div>
      <div class="col"><b>Preço</b></div>
      <div class="col"><b>Tamanho</b></div>
      <div class="col"><b>Quantidade</b></div>
      </div><hr>';
      foreach ($carrinho as $item) {
        echo '<div class="row">
        <div class="col">'.$item['nome'].'</div>
        <div class="col">'.$item['descricao'].'</div>
        <div class="col">R$ '.$item['preco'].'</div>
        <div class="col">'.$item['tamanho'].'</div>
        <div class="col">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        '.$item['quantidade'].'</div>
        </div><hr>';
      }
    }
    ?>
    <br>
  <h2> Endereço</h2><hr>  
  <?php 
  require_once("../PagUsuario/PerfilCtrl.php");
  $dados = PegardadosCtrl($login);
  ?>  
  <h2>Município: <?php echo $dados['Municipio']; ?></h2>
  <h2>Rua: <?php echo $dados['Rua']; ?></h2>
  <h2>Complemento: <?php echo $dados['Complemento']; ?></h2>
  <br>
  <h2>Informações do cliente </h2><hr>
  <h2>Nome: <?php echo $dados['nome']; ?></h2>
  <h2>Telefone: <?php echo $dados['telefone']; ?></h2>
  <h2>Forma de pagamento: <?php echo $_GET['formaPag']; ?> </h2>
  <br><hr>
  <center><h2 class="alert alert-danger">Para cancelar o pedido ligue para  a loja!</h2></center>
  </div>
  </div>
  
  <!--Rodapé -->
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