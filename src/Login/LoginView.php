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
     body {
    background-image: url('../Imagens/imgFundo.jpg');
    width: 100%;
    height: auto;
    background-size: cover;
    color: white;
      } 
    </style>
</head>
<body>
<?php
    if(count($_REQUEST) != 0){
      echo ('
        <br>
        <style>
        #Erros{
          visibility:visible;
          background-color: #ffff80;
          width: 50%;
          text-align: center;
          border: solid 1px;
          padding: 3px;
          font-size: 18px;
        }
        </style>
        ');
    }
    ?>

    <center>
    <div id='Erros'>
    <?php
      foreach($_REQUEST as $item){
      print($item);
      }
    ?>
    </div>
    </center>
    
    <!-- Inicio de formulario -->
  
    <div class="container" style="margin-top: 50px; width:500px;"> 
    
    <form id="cadastro" method="POST" action="LoginCtrl.php">
    <h3>Login</h3>
    <br> 
    <div class="form-group">
    <input type ="text" name ="emailLogin" id="emailLogin" class="form-control" placeholder="Email ou Login" size="29px" required>
    </div>
    <div class="form-group">
    <input type ="password" name="senha" id="senha" class="form-control" placeholder="Senha" size="29px" onkeypress= "return senhaLogin();" required>
    </div>
    <input type ="submit" name ="Entrar" value ="Entrar" class="btn btn-primary" id="botao" style="width:100%"> <br> <br>

    <center><a href="pagPerdiSenha.html">Esqueceu a senha?</a></center>  <br><br>
    Ainda não tem uma conta? <a href="../Cadastro/CadastroView.php">Cadastre-se agora.</a>  
    </form>
    </div>
    <!-- fim de formulario -->
</body>
</html>