<?php
  session_start();

  if(!isset($_SESSION["logi"])){
    header("location: ../Login/LoginView.php");
    exit();
  }
  else{
    $login = $_SESSION["logi"];
  }

?>

<!doctype html> 
<html> 
  <head> 
    <title> historico </title> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Estilo/Perfil.css">
    <link rel ="stylesheet" href ="../Estilo/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <script src="../Estilo/jquery.min.js"></script>
    <script src="../Estilo/popper.min.js"></script>
    <script src ="../Estilo/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
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
        <li class="nav-item">
          <a href="#" class="btn btn-primary" data-toggle="popover" data-popover-content="#a1" data-placement="top">Carrinho</a>
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
      <div class ="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class ="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle ml-auto" href="#" id="navbardrop" data-toggle="dropdown">
          Usuário
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="../PagUsuario/PerfilView.php">Seu perfil</a>
          <a class="dropdown-item" href="HistoricoViewC.php">Histórico de compras</a>
        </div>
      </li>
      </ul>
      </div>

    <!-- fim da barra de navegação aqui -->
  </nav>

  
<div class="container-fluid" style="margin-top: 100px;">
<br>
<center><h2>Histórico de pedidos </h2></center>
<hr>
  <?php
  require_once("HistoricoCtrl.php");
  require_once("../PagUsuario/PerfilCtrl.php");
  $url = $_SERVER["REQUEST_URI"];
  $_SESSION['url'] = $url;
  $dados = PegardadosCtrl($login);
  $historico = recuperarHistoricoCCtrl($dados['id']);
  foreach($historico as $row) {
  ?>
  <div class="shadow p-3 mb-5 bg-white rounded">
  <div class="row">
    <div class="col col-lg-3">
      <h3 style="font-size:22px"> Pedido </h3>
      <p>Número - <?php echo $row['id']?></p>
      <p>Realizado - <?php echo $row['diahora']?></p>
      <p>Status - 
      <?php 
      if($row['estado']){
        echo 'Concluido';
      }else{
      echo 'Em andamento...';
      }
      ?></p>
    </div>
    <div class="col">
      <h3 style="font-size:22px"> Cliente </h3>
      <p><?php echo $row['usuario']?></p>
      <p>Telefone: <?php echo $row['telefone']?></p>
      <p>Endereço: <?php echo ''.$row['rua'] .' / '. $row['municipio'] .' / '. $row['complemento'].''?></p>
    </div>
    <div class="col">
      <h3 style="font-size:22px"> Resumo da compra </h3>
      <p><?php
            foreach ($row['itens'] as $item) {
              echo $item['produto'] . " " . $item['tamanho'] . "( R$ " . $item['preco'] . " )" . " x " .  $item['qtd'] ." unidade(s) </br>" ;
            }?>
      </p>
      <p>Forma de pagamento: <?php echo $row['formapag']?></p>
      <p>Total: <?php echo 'R$ '.$row['precototal'].''?></p>
    </div>
  </div>
  </div>
  <?php
  }
  ?>

</div>
<!--Rodapé no final da página-->
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