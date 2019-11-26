<?php
  session_start();
  require_once("../PagUsuario/PerfilCtrl.php");

  if(!isset($_SESSION["logi"])){
    header("location: ../Login/LoginView.php");
    exit();
  }
  else{
    $login = $_SESSION["logi"];
    $dados = PegardadosCtrl($login);
    if(!$dados["adm"]){
      header("location: ../Inicial/index.php");
    }
  }
?>
<!doctype html> 
<html> 
  <head> 
    <title> Criar Produto </title> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel ="stylesheet" href ="../Estilo/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <script src="../Estilo/jquery.min.js"></script> <script src="../Estilo/popper.min.js"></script> 
    <script src ="../Estilo/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script> 
		<script>
			function previewImagem(){
				var imagem = document.querySelector('input[name=imagem]').files[0];
				var preview = document.querySelector('img[name=pre]');
				
				var reader = new FileReader();
				
				reader.onloadend = function () {
					preview.src = reader.result;
				}
				
				if(imagem){
					reader.readAsDataURL(imagem);
				}else{
					preview.src = "";
				}
			}
		</script>
    <style>

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


    footer{
      position:relative;
      bottom:0;
      width:100%;
      background-color: white;
      color: #6c757d;
      margin-top:200px;
    }

    </style>
  </head> 
  
<body>

<!-- Barra de navegação -->
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
  <!-- Dropdown -->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      Usuário
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../PagUsuario/PerfilView.php">Seu perfil</a>
      <a class="dropdown-item" href="../PaHistorico/HistoricoViewA.php">Lista de Pedidos</a>
    </div>
  </li>  
  </div>
  </nav>  

<div class="container" style="margin-top: 110px">
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

<div class="shadow p-3 mb-5 bg-white rounded"> 
  <?php

  ?>
  <!--Inicio do formlário com os dados atuais-->

    <form enctype="multipart/form-data" method="POST" action="CriarProdCtrl.php"> 
    <h1 style="font-size:28px">Criar Produto</h1>
    <div class="row">
    <div class="col"><div class="form-group">
    <label for ="nome"> Nome </label> 
    <input type ="text" class="form-control" name="nome" id= "nome" maxlength="40" placeholder="" required>
    </div>
    <div class="form-group">
    <label for ="descricao"> Descrição </label> 
    <input type ="text" class="form-control" name ="descricao" id= "descricao" maxlength="100" placeholder="" required> 
    </div>
    <label for="Categoria">Categoria</label>
    <select name="Categoria" id="Categoria" class="form-control" required >
    <option value="" disabled selected>Selecione a categoria</option>
	  <option value="1">Pizza</option>
    <option value="2">Hamburguer</option>
    <option value="3">Combos</option>
    <option value="4">Batatas</option>
    <option value="5">Bebidas</option>
    <option value="6">Bordas</option>
    </select>
    </div>
    <div class="col">
    <div class="file-field" style="style=width: 400px; padding-left: 80px;">  
      <input type="file" name="imagem" id="imagem" onchange="previewImagem()" required><br><br>
			<img style="width: 350px;" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" name="pre">
    </div>
    </div>
    </div>

    <br>
    <div class="row">
    <div class="col"><div class="form-group">
    <label for ="precoP"> Preço Único</label> 
    <input type ="text" class="form-control" name ="precoP" id="precoP" maxlength="6" pattern="[\d,.]*" placeholder="">
    </div></div></div>
    <div class= "row">
    <div class="col"><div class="form-group">
    <label for ="precoG"> Preço Grande</label> 
    <input type ="text" class="form-control" name ="precoG" id="precoG" maxlength="6" pattern="[\d,.]*" placeholder="">
    </div></div>
    <div class="col"><div class="form-group">
    <label for ="precoGG"> Preço Gigante</label> 
    <input type ="text" class="form-control" name ="precoGG" id="precoGG" maxlength="6" pattern="[\d,.]*" placeholder="">
    </div></div></div>
    <br><br>

    <center> 
    <input type= "submit" class= "btn btn-outline-success" value="Criar Produto">
    <a class="btn btn-outline-danger" href="../Inicial/index.php">Voltar</a> 
    </center>
    </form>
 	
</div>
</div>
<br>

<!--Rodapé no final da página-->
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
