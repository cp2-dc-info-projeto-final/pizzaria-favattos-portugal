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
    <script src="../Funcoes/ScriptInput.js"></script>

    <style>
    body{
      background-image:url("../Imagens/imgfundo.jpg");
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
          top: 150px;
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
    <div class="container" style="margin-top: 50px; color:white;"> 
   
    <form id= "cadastro" method="POST" action="CadastroCtrl.php" onsubmit="return validate()">
    
    <h3>Cadastro</h3>
    <h4>Cadastre-se para ter acesso as delícias da Favatto's Portugal</h4>

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

    <label>Sexo:</label>
    <div class="custom-control custom-radio">
    <input type ="radio" name = "sexo" id="masc" class="custom-control-input" value="Masculino">
    <label for="masc" class="custom-control-label">Masculino</label> 
    </div>
    <div class="custom-control custom-radio">
    <input type ="radio" name ="sexo" id="fem" class="custom-control-input" value="Feminino">
    <label for="fem" class="custom-control-label">Feminino</label>
    </div><br>       

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
    <select><br>

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
    
    <input type ="submit" name ="cadastrar" value ="Cadastrar" class="btn btn-success"><br><br>

    Já possui uma conta? <a href="../Login/LoginView.php" style ="color:green">Entre agora.</a>
    <!-- fim de formulario -->
    
    </form> 
    </div> 

</body>

</html>
