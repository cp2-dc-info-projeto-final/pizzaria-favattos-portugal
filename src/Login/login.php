<!DOCTYPE html>
<html>
<head>
   <title>login</title> 

</head>

<body>

<?php

    session_start();

    require_once("../Funcoes/CriaConexao.php");
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO
    $login = $_REQUEST ["emailLogin"];
    $senha = $_REQUEST["senha"];

//Testar se já é cadastrado

$con = CriarConexao();
$consulta = $con->prepare('SELECT email FROM cliente WHERE email = :logi or logi = :logi');
$consulta->bindValue(':logi',$login);
$consulta->execute();

$consulta2 = $con->prepare('SELECT senha FROM cliente WHERE email = :logi or logi = :logi');
$consulta2->bindValue(':logi',$login);
$consulta2->execute(); 

$consulta2 = $consulta2 -> fetch();
$hash = $consulta2['senha'];

//login válido

if($consulta->rowCount() == 1 && password_verify($senha, $hash) ){
    $_SESSION['logi'] = $login;
    echo "Login efetuado com sucesso";
    header('location:../PagUsuario/perfil.php');
}
//login incorreto ou inválido
else{
    unset ($_SESSION['logi']);
    unset ($_SESSION['senha']);
    echo "Falha no login tente novamente";
    //header('location:login.html');
}



?>

</body>

</html>