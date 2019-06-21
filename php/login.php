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


$mysqli = CriarConexao();
$consulta = mysqli_query ($mysqli,"SELECT * FROM cliente WHERE email = '$login' or logi = '$login'");
$linha = mysqli_num_rows($consulta);
if($linha==0){

    // Usuário Cadastrado;

}

else{
    Echo "Usuário já cadastrado";
}




//Precisa de ajuda?


//Lembre-se de mim


?>

</body>

</html>