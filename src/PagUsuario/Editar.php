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
    </head> 
    
    <body> 
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
      <li class="nav-item">
        <a class="nav-link" href="#">Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Nossa Gastronomia</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="#">Fotos</a>
      </li>
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Usuário
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Seu perfil</a>
          <a class="dropdown-item" href="#">Histórico de compras</a>
          <a class="dropdown-item" href="#">Link 3</a>
        </div>
      </li>
    </ul>
    </div>
    </nav>  

    <!-- Formulário -->
    <div class="container" style="margin-top: 180px"> 
    <div class="shadow p-3 mb-5 bg-white rounded"> 
        <form> 
        <div class="form-group">
        <label for ="email"> E-mail </label> 
        <input type ="email" class="form-control" name= "email" id= "email">
        </div> 

        <label>Sexo</label> 
        <div class="form-check">
        <input type ="radio" class="form-check-input" name = "sexo" id="masc" value="Masculino">
        <label class="form-check-label" for="masc">Masculino</label>
        </div> 
        <div class="form-check">
        <input type ="radio" name ="sexo" class="form-check-input" id="fem" value="Feminino">
        <label class="form-check-label" for="fem">Feminino</label>    
        </div>
        <br>

        <div class="form-group">
        <label for ="telefone"> Telefone </label> 
        <input type ="text" class="form-control" name ="telefone" id= "telefone"> 
        </div>

        <div class="form-group">
        <label for ="endereco"> Endereço </label> 
        <input type ="text" class="form-control" name ="endereco" id="endereco"> 
        </div>
        </form> 
    <br>
    <center> 
    <a class="btn btn-outline-danger" href="perfil.php">Voltar</a> 
    </center>
    <hr>
    </div> 
    </div> 

    <!--Rodapé -->
    <nav class="navbar bg-dark navbar-dark fixed-bottom"> 
    <div class="container"> 
    <span class="text-muted">Até que enfim foi</span> 
    </nav> 

    </body> 
</html>