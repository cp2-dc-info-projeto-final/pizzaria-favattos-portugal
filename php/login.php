<!DOCTYPE html>
<html>
<head>
   <title>login</title> 

</head>

<body>

<?php

    require_once("CriaConexao.php");
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO
    $login = $_POST ["emailLogin"];
    $senha = $_POST["senha"];

//Testar se já é cadastrado

$con = CriarConexao();
$consulta = $con->prepare("SELECT * FROM cliente WHERE email = '$login' or logi = '$login'");
$consulta->execute();

if($consulta->rowCount()==0){
 //Email ou senha incorretos;    
}

else{
    Echo "Usuário já cadastrado";
    //Encaminhar ele para outra página
}




//Precisa de ajuda?


//Lembre-se de mim


?>

</body>

</html>