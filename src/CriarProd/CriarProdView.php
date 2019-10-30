<!doctype html> 
<html> 
  <head> 
    <title> Criar Produto </title> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel ="stylesheet" href ="../Estilo/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <script src="../Estilo/jquery.min.js"></script> <script src="../Estilo/popper.min.js"></script> 
    <script src ="../Estilo/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script> 
    <script src="../Funcoes/ScriptInput.js"></script>
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
          <a class="nav-link" href="#">Nossa Gastronomia</a>
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
          <a class="dropdown-item" href="#">Histórico de compras</a>
        </div>
      </li>
      </ul>
      </div>
    <!-- fim da barra de navegação aqui -->
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

    <form method="POST" action="CriarProdCtrl.php"> 
    <h1 style="font-size:28px">Criar Produto</h1>
    <div class="row">
    <div class="col"><div class="form-group">
    <label for ="nome"> Nome </label> 
    <input type ="text" class="form-control" name="nome" id= "nome" maxlength="40" placeholder="">
    </div>
    <div class="form-group">
    <label for ="descricao"> Descrição </label> 
    <input type ="text" class="form-control" name ="descricao" id= "descricao" maxlength="100" placeholder=""> 
    </div>
    <label for="Categoria">Categoria</label>
    <select name="Categoria" id="Categoria" class="form-control">
    <option value="" disabled selected>Selecione a categoria</option>
	  <option value="1">Pizza</option>
    <option value="2">Hamburguer</option>
    <option value="3">Combos</option>
    <option value="4">Batatas</option>
    <option value="5">Bebidas</option>
    <option value="6">Bordas</option>
    </select>
    </div>
    <div class="col"><div class="file-field" style="style=width: 400px; padding-left: 80px;">
    <div class="z-depth-1-half mb-4">
      <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" class="img-fluid" style="width: 350px;">
    </div>
    <div class="d-flex justify-content-center">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
        <input type="file" style="color:transparent;" name="img" id="img">
    </div>
    </div></div></div>
    <br>
    <div class="row">
    <div class="col"><div class="form-group">
    <label for ="precoP"> Preço Pequeno</label> 
    <input type ="text" class="form-control" name ="precoP" id="precoP" maxlength="6" pattern="[\d,.]*" placeholder="">
    </div></div>
    <div class="col"><div class="form-group">
    <label for ="precoM"> Preço Medio</label> 
    <input type ="text" class="form-control" name ="precoM" id="precoM" maxlength="6" pattern="[\d,.]*" placeholder="">
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
<nav class="navbar bg-dark navbar-dark fixed-bottom"> 
<div class="container"> 
<span class="text-muted">Até que enfim foi</span> 
</nav> 
</body> 
</html>

<!--https://forum.imasters.com.br/topic/534442-sistema-de-inserir-foto-igual-do-perfil-do-facebook/-->