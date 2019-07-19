<?php
require_once("../Funcoes/CriaConexao.php");

function Cadastrado($login,$senha){

//Testa se é cadastrado
$con = CriarConexao();
$consulta = $con->prepare('SELECT email FROM cliente WHERE email = :logi or logi = :logi');
$consulta->bindValue(':logi',$login);
$consulta->execute();

$consulta2 = $con->prepare('SELECT senha FROM cliente WHERE email = :logi or logi = :logi');
$consulta2->bindValue(':logi',$login);
$consulta2->execute(); 

$consulta2 = $consulta2 -> fetch();
$hash = $consulta2['senha'];

//Validando login

if(!($consulta->rowCount() == 1 && password_verify($senha, $hash))){
    $text = "Falha no login. Verifique as informações e tente novamente.";
    throw new Exception($text);
}

}

?>