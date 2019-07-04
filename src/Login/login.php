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
    $senha = password_hash($_REQUEST["senha"],PASSWORD_DEFAULT););

//Testar se já é cadastrado

$con = CriarConexao();
$consulta = $con->prepare('SELECT * FROM cliente WHERE email = :logi or logi = :logi and senha = :senha');
$consulta->bindValue(':logi',$login);
$consulta->bindValue(':senha', $senha);
$consulta->execute();

//login válido
if($consulta->rowCount() == 1){
    $_SESSION['logi'] = $login;
    $_SESSION['senha'] = $senha;
    echo "Login efetuado com sucesso";
    //header('location:site.php');
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