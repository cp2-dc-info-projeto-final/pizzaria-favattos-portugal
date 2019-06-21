<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
</head>

<body>

<?php

require_once("CriaConexao.php");
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO
$nome = $_POST["nome"];
$email = $_POST["email"];
$tel = $_POST["telefone"];
$endereco = $_POST["endereco"];
$data_nascimento = $_POST["dataN"];
$cpf = $_POST["cpf"];
$sexo = $_POST["sexo"];
$login = $_POST["login"];
$senha = md5($_POST["senha"]);


    //Gravando no banco de dados !
    //conectando com o localhost - mysql

    $mysqli = CriarConexao();

    //Verificando dados

    if($mysqli->query("SELECT email FROM cliente WHERE email=$email")!=null){
        echo "email ja foi cadastrado";
    }elseif($mysqli->query("SELECT logi FROM cliente WHERE logi=$login")!=null){
        echo"login ja foi cadastrado";
    }elseif($mysqli->query("SELECT cpf FROM cliente WHERE cpf=$cpf")!=null){
        echo"cpf ja foi cadastrado";
    }
    else{
    
    $query = "INSERT INTO cliente (nome, data_nasc, sexo, email, logi, senha, cpf, endereco, telefone)
              VALUES ('$nome','$data_nascimento','$sexo','$email','$login','$senha','$cpf','$endereco','$tel')";
    
    $mysqli->query($query) or die($mysqli->error);

    echo "Seu cadastro foi realizado com sucesso!<br>Agradecemos a atenção.";
    }

    //fechando conexão

    mysqli_close($mysqli);

?>

</body>
</html>
