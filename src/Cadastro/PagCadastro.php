<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
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
    <form id= "cadastro" method="POST" action="Cadastro.php" onsubmit="return validate()" >
    
    <h3>Cadastro</h3>
    <h4>Cadastre-se para ter acesso as delícias da Favatto's Portugal</h4>
    <label for ="nome"> Nome: </label>
    <input type = "text" name ="nome" id ="nome" placeholder="Nome Completo" minlength="10" maxlength="80" onkeypress="return letras();" required> <br> <br>

    <label for="datan">Data de Nascimento:</label>
    <input type ="date" name ="dataN" id="datan" min ="1919-06-24" max ="2015-01-01" required>  

    <fieldset id="fSexo"><legend>Sexo:</legend>
    <input type ="radio" name = "sexo" id="masc" value="Masculino">
    <label for="masc">Masculino</label> <br>
    <input type ="radio" name ="sexo" id="fem" value="Feminino">
    <label for="fem">Feminino</label> <br>       
    </fieldset> 

    <label for="telefone"> Telefone:</label> 
    <input type ="text" name ="telefone" id="telefone" placeholder="Ex: (00)00000-0000" maxlength="11" size="17" onkeypress="return numeros();" required><br> <br>

    <label for="cpf"> CPF:</label> 
    <input type ="text" name ="cpf" id="cpf" placeholder="Ex: 000.000.000-00" maxlength="11" size="17" onkeypress="return numeros();" required> <br> <br>

    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" id="endereco" size="30" minlength="15" maxlength="320" placeholder="Insira seu endereço" onkeypress="return local();" required><br><br>

    <label for ="email">E-mail:</label> 
    <input type ="email" name ="email" id="email" size="22" maxlength="125" placeholder = "exemplo@exemplo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required> <br> <br>

    <label for="login">Login:</label> 
    <input type ="text" name ="login" id="login" placeholder="Seu login (somente letras e numeros)" minlength="4" maxlength="10" onkeypress="return senhaLogin();" required>  <br> <br>

    <label for="senha">Senha:</label> 
    <input type ="password" name="senha" id="senha" minlength="7" maxlength = "15" placeholder= "Somente letras e números" onkeypress="return senhaLogin();" required> <br> <br>

    <label for="Csenha">Confirmar senha:</label> 
    <input type ="password" name="Csenha" id="Csenha" minlength="7" maxlength = "15" placeholder= "Confirme sua senha" onkeypress= "return senhaLogin();" required> <br> <br>

    
    <input type ="submit" name ="cadastrar" value ="Cadastrar" ><br><br>

    Já possui uma conta? <a href="../Login/PagLogin.php">Entre agora.</a>
    <!-- fim de formulario -->
    
    </form>
    </div>    
    

</body>

</html>
