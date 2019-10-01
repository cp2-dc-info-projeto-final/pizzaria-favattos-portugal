<!doctype html> 
<html> 
  <head> 
    <title> historico </title> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="../Estilo/Perfil.css">
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
  <!-- Dropdown -->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      Usuário
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../PagUsuario/PerfilView.php">Seu perfil</a>
      <a class="dropdown-item" href="#">Histórico de compras</a>
      <a class="dropdown-item" href="#">Link 3</a>
    </div>
  </li>  
  </div>
  </nav> 


<div class="container-fluid" style="margin-top: 100px;">

  <!-- Formulário -->
  <div class="container" style="margin-top: 110px">
  <!-- Caixa de erros -->
    <br>
      <?php
        foreach($_REQUEST as $item){
          foreach (explode("|", $item) as $item_item) {
      ?>
      <div class="alert alert-danger" role="alert">
      <?php
      print($item_item . ".");
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
  ?>
  <!--Inicio do formlário com os dados atuais-->
  <form method="POST" action="EditarCtrl.php"> 
  <h1>Redefinir Dados</h1>
  <div class="form-group">
  <label for ="email"> E-mail </label> 
  <input type ="email" class="form-control" name= "email" id= "email" maxlength="125" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder= <?php echo $dados['email']; ?>>
  </div> 
  <?php
    if($dados['sexo']=="Masculino"){
      echo "<label>Sexo</label> 
            <div class='form-check'>
            <input type ='radio' class='form-check-input' name = 'sexo' id='masc' value='Masculino' checked>
            <label class='form-check-label' for='masc'>Masculino</label>
            </div> 
            <div class='form-check'>
            <input type ='radio' name ='sexo' class='form-check-input' id='fem' value='Feminino'>
            <label class='form-check-label' for='fem'>Feminino</label>    
            </div>";
    }else{
      echo"<label>Sexo</label> 
          <div class='form-check'>
          <input type ='radio' class='form-check-input' name = 'sexo' id='masc' value='Masculino'>
          <label class='form-check-label' for='masc'>Masculino</label>
          </div> 
          <div class='form-check'>
          <input type ='radio' name ='sexo' class='form-check-input' id='fem' value='Feminino' checked>
          <label class='form-check-label' for='fem'>Feminino</label>    
          </div>";
    }
  ?>
  <br>
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
<br>


<!--Rodapé no final da página-->
<nav class="navbar bg-dark navbar-dark fixed-bottom"> 
<div class="container"> 
<span class="text-muted">Até que enfim foi</span> 
</nav> 
</body> 
</html>