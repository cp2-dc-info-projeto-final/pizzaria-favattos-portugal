<?php
  session_start();

  $url = $_SERVER["REQUEST_URI"];
  $_SESSION['url'] = $url;

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
  <title> Dados </title> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  <link rel="stylesheet" href="../Estilo/Perfil.css">
  <link rel ="stylesheet" href ="../Estilo/bootstrap-4.1.3-dist/css/bootstrap.min.css">
  <script src="../Estilo/jquery.min.js"></script> <script src="../Estilo/popper.min.js"></script> 
  <script src ="../Estilo/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script> 
  <script src="../Funcoes/ScriptInput.js"></script>

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

  <style>
    .alert {
      margin-bottom: 8px !important;
    }

    .popover {
      max-width: 100% !important;
    }

    footer{
      position:relative;
      bottom:0;
      width:100%;
      background-color: #212529;
      color: #6c757d;
      margin-top:100px;
    }
  </style>
  </head> 
  
  <body>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <!-- Logo -->
  <a class="navbar-brand" href="../Inicial/index.php">
          <img src="" alt="Logo" style="width:40px;">
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
          <a class="dropdown-item" href="../PagHistorico/HistoricoViewC.php">Histórico de compras</a>
        </div>
      </li>
      </ul>
      </div>

    <!-- fim da barra de navegação aqui -->
  </nav>  
  <!-- Formulário -->
  <div class="container" style="margin-top: 110px">
  <!-- Caixa de erros -->
    <br>
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
      
  <div class="row"> 
  <div class="col-8">
  <div class="shadow p-3 mb-5 bg-white rounded"> 
  <?php
    require_once("PerfilCtrl.php");
    $dados = PegardadosCtrl($login);
  ?>
  <!--Inicio do formlário com os dados atuais-->
  <form method="POST" action="EditarCtrl.php"> 
  <h1>Redefinir Dados</h1>
  <div class="form-group">
  <label for ="email"> E-mail </label> 
  <input type ="email" class="form-control" name= "email" id= "email" maxlength="125" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder= <?php echo $dados['email']; ?>>
  </div> 
  <div class="form-group">
  <label for ="telefone"> Telefone </label> 
  <input type ="text" class="form-control" name ="telefone" id= "telefone" minlength= "11" maxlength="11" onkeypress="return numeros();" placeholder= <?php echo $dados['telefone']; ?>> 
  </div>
  <div class="form-group">
  <label for ="Rua"> Rua/Numero </label> 
  <input type ="text" class="form-control" name ="Rua" id="Rua" minlength="5" maxlength="320" onkeypress="return local();" placeholder= <?php echo $dados['Rua']; ?>>
  </div>
  <label for="municipio">Município:</label>
    <select name="municipio" id="municipio" class="form-control">
    <option value="" disabled selected><?php echo $dados['Municipio'];?></option>
	  <option value="Belford Roxo">BELFORD ROXO</option>
    <option value="Duque de Caxias">DUQUE DE CAXIAS</option>
    <option value="Guapimirim">GUAPIMIRIM</option>
    <option value="Itaguai">ITAGUAI</option>
    <option value="Japeri">JAPERI</option>
    <option value="Magé">MAGÉ</option>
    <option value="Mesquita">MESQUITA</option>
    <option value="Nilopolis">NILOPOLIS</option>
    <option value="Nova Iguaçu">NOVA IGUAÇU</option>
    <option value="Paracambi">PARACAMBI</option>
    <option value="Queimados">QUEIMADOS</option>
    <option value="São João de Meriti">SÃO JOAO DE MERITI</option>
    <option value="Seropedica">SEROPEDICA</option>
    <select><br>
  <div class="form-group">
  <label for ="complemento"> Complemento </label> 
  <input type ="text" class="form-control" name ="complemento" id="complemento" minlength="5" maxlength="320" onkeypress="return local();" placeholder= <?php echo $dados['Complemento']; ?>> 
  </div>
      
  <br>
  <center> 
  <input type= "submit" class= "btn btn-outline-success" value= "Aplicar Mudanças">
  <a class="btn btn-outline-danger" href="PerfilView.php">Voltar</a> 
  </center>
  </form>
  </div>
  </div>  
  
  <div class="col-sm">
  <div class="shadow p-3 mb-5 bg-white rounded"> 

  <form method="POST" action="SenhaCtrl.php"> 
  <h1>Alterar Senha</h1>
  <div class ="form-group">
  <label for ="senhaA"> Digite a senha atual </label>
  <input type ="password" class="form-control" name ="senhaA" id="senhaA" minlength="7" maxlength="100" onkeypress="return SenhaLogin();">
  </div>     
  <div class="form-group">
  <label for ="senha"> Alterar Senha </label>
  <input type ="password" class="form-control" name="senha" id="senha" minlength="7" maxlength="100" onkeypress="return SenhaLogin();">
  </div>
  <div class ="form-group">
  <label for ="Csenha"> Repetir alteração de senha </label>
  <input type ="password" class ="form-control" name="Csenha" id="Csenha" minlength="7" maxlength="100" onkeypress ="return SenhaLogin();">
  </div>
  <center>
  <input type= "submit" class= "btn btn-outline-success" value= "Alterar senha">
  </center>
  </form>
  </div> 
  </div>

  </div></div>
  
  <!--Rodapé -->
  <footer class="page-footer pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id felis in justo blandit egestas blandit nec nibh. Donec pellentesque nulla vel quam aliquam, sed posuere augue euismod. Quisque iaculis sit amet lectus eu accumsan. Nulla mattis mattis mauris, sed rutrum nulla molestie non. Mauris non interdum lacus, a varius lacus. Ut iaculis aliquet purus sed congue. Suspendisse egestas placerat arcu ut mattis. Cras mollis felis lorem, ac euismod justo sodales sit amet.</p>
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
                        <input type ="submit" class="btn btn-primary">
                    </fieldset>
                </form>
            </div>
        </div>
      </div>
  </footer>
  </body> 
</html>