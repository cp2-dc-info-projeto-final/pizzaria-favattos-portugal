<?php
  session_start();


  if(isset($_SESSION["logi"])){
    header("location: ../PagUsuario/PerfilView.php");
    exit();
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Cadastro</title>
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  <link rel ="stylesheet" href ="../Estilo/bootstrap-4.1.3-dist/css/bootstrap.min.css">
  <script src="../Estilo/jquery.min.js"></script> <script src="../Estilo/popper.min.js"></script> 
  <script src ="../Estilo/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script> 
  <script src="../Funcoes/ScriptInput.js"></script>
  <script>
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
  <div class="container" style="margin-top: 100px;"> 
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
    <form id= "cadastro" method="POST" action="CadastroCtrl.php">
    
    <h3>Cadastro</h3>
    <h4>Cadastre-se para ter acesso as delícias da Favatto's Portugal</h4><br>

    <div class="form-row">
      <div class="form-group col-md-6">
      <label for ="nome"> Nome: </label>
      <input type = "text" name ="nome" id ="nome" class="form-control" placeholder="Nome Completo" minlength="10" maxlength="80" onkeypress="return letras();" required>
      </div>
      <div class="form-group col-md-6">
      <label for="datan">Data de Nascimento:</label>
      <input type ="date" name ="dataN" id="datan" class="form-control" min ="1919-06-24" max ="2015-01-01" required>  
      </div>
    </div>       

    <div class="form-row">
      <div class="form-group col-md-6">  
        <label for="telefone"> Telefone:</label> 
        <input type ="text" name ="telefone" id="telefone" class="form-control" placeholder="Ex: (00)00000-0000" minlength= "11" maxlength="11" size="17" onkeypress="return numeros();" required>
      </div>
      <div class="form-group col-md-6">
        <label for="cpf"> CPF:</label> 
        <input type ="text" name ="cpf" id="cpf" class="form-control" placeholder="Ex: 000.000.000-00" maxlength="11" size="17" onkeypress="return numeros();" required>
      </div>
    </div>

    <label for="municipio">Município:</label>
    <select name="municipio" id="municipio" class="form-control">
    <option value="" disabled selected>Selecione seu município</option>
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
    </select><br>

    <div class="form-row">
      <div class="form-group col-md-6"> 
      <label for="rua">Rua/Numero:</label>
      <input type="text" name="rua" id="rua" class="form-control" size="30" minlength="3" maxlength="150" placeholder="Nome da rua, número" onkeypress="return local();" required> 
      </div>
      <div class="form-group col-md-6"> 
      <label for="complemento">Complemento:</label>
      <input type="text" name="complemento" id="complemento" class="form-control" size="30" minlength="3" maxlength="50" placeholder="Complemento do endereço" onkeypress="return local();" required>  
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
      <label for ="email">E-mail:</label> 
      <input type ="email" name ="email" id="email" class="form-control" size="22" maxlength="125" placeholder = "exemplo@exemplo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
      </div>
      <div class="form-group col-md-6">
      <label for="login">Login:</label> 
      <input type ="text" name ="login" id="login" class="form-control" placeholder="Seu login (somente letras e numeros)" minlength="4" maxlength="10" onkeypress="return senhaLogin();" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
      <label for="senha">Senha:</label> 
      <input type ="password" name="senha" id="senha" class="form-control" minlength="7" maxlength = "15" placeholder= "Somente letras e números" onkeypress="return senhaLogin();" required> 
      </div>
      <div class="form-group col-md-6">
      <label for="Csenha">Confirmar senha:</label> 
      <input type ="password" name="Csenha" id="Csenha" class="form-control" minlength="7" maxlength = "15" placeholder= "Confirme sua senha" onkeypress= "return senhaLogin();" required>
      </div>
    </div>
    
    <input type ="submit" name ="cadastrar" id="cadastrar" value ="Cadastrar" class="btn btn-outline-success"><br><br>

    <label>Já possui uma conta?</label> <a href="../Login/LoginView.php" style ="color:green">Entre agora.</a>
    <!-- fim de formulario -->
    
    </form> 
    </div>
    </div> 

</body>

</html>
