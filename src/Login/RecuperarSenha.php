<?php
    require_once("../Funcoes/CriaConexao.php");

    if( empty($_GET['email']) || empty($_GET['confirmacao']) )
    die('<p>Não é possível alterar a password: dados em falta</p>');

    //verificando dados

    $email = $_GET['email'];
    $confirmacao = $_GET['confirmacao'];
    $con = CriaConexao();

    $consulta = $con->prepare("SELECT * FROM recuperacao WHERE email = :email AND confirmacao = :confirmacao");
    $consulta->bindValue(':email',$email);
    $consulta->bindValue(':confirmacao',$confirmacao);
    $consulta->execute();

    if($consulta->rowCount() == 1){
        // os dados estão corretos: eliminar o pedido e permitir alterar a password
        $consulta2 = $con->prepare("DELETE FROM recuperacao WHERE email = :email AND confirmacao = :confirmacao");
        $consulta2->bindValue(':email',$email);
        $consulta2->bindValue(':confirmacao',$confirmacao);
        $consulta2->execute();
        echo "<html>
        <head>
            <title>RecuperarSenha</title>
            <link rel="stylesheet" href="../Estilo/form.css">
            <meta charset="UTF-8">
            <script src="../Funcoes/ScriptInput.js"></script>
        </head>
        <body>
        
            <div class="container">
            <form id="cadastro" method="POST" action="login.php">
            <h3>Login</h3>
            <br> 
            <input type ="password" name="senha" id="senha" placeholder="Informe a nova Senha" size="29px" onkeypress= "return senhaLogin();" required> <br><br>
            <input type ="password" name="ConfirmarSenha" id="ConfirmarSenha" placeholder="Confirme sua Senha" size="29px" onkeypress= "return senhaLogin();" required> <br><br>
            <input type ="submit" name ="Recuperar" value ="Confirmar" id="botao" > <br> <br>
            </form>
            </div>
        
        </body>
        </hmtl>";  

    }else{
        echo '<p>Não é possível alterar a password: dados incorretos</p>';
    }

    