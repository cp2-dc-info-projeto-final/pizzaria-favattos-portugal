<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../Estilo/form.css">
    <meta charset="UTF-8">
    <script src="../Funcoes/ScriptInput.js"></script>
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
    <div class="container">
    <form id="cadastro" method="POST" action="LoginCtrl.php">
    <h3>Login</h3>
    <br> 
    <input type ="text" name ="emailLogin" id="emailLogin" placeholder="Email ou Login" size="29px" required> <br><br>
    <input type ="password" name="senha" id="senha" placeholder="Senha" size="29px" onkeypress= "return senhaLogin();" required> <br><br>
    <input type ="submit" name ="Entrar" value ="Entrar" id="botao" > <br> <br>

    <center><a href="pagPerdiSenha.html">Esqueceu a senha?</a></center>  <br><br>
    Ainda não tem uma conta? <a href="../Cadastro/CadastroView.php">Cadastre-se agora.</a>  
    </form>
    </div>
    <!-- fim de formulario -->
</body>
</hmtl>