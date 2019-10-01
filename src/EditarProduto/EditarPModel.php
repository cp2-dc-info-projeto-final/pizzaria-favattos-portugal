<?php
function AlterarDados($email,$sexo,$telefone,$rua,$municipio,$complemento,$login){

// Alterando dados do usuário pelos dados informados
$dados = PegarDados($login);
if($email == ""){
    $email = $dados['email'];
}
if($telefone == ""){
    $telefone = $dados['telefone'];
}
if($rua == ""){
    $rua = $dados['rua'];
}
if($municipio == ""){
    $municipio = $dados['municipio'];
}
if($complemento == ""){
    $complemento = $dados['complemento'];
}
$con = CriarConexao();
$consulta = $con->prepare('UPDATE usuario SET email=:email, sexo=:sexo, telefone=:telefone, municipio=:municipio, complemento=:complemento, rua=:rua WHERE logi = :logi');
$consulta->bindValue(':email',$email);
$consulta->bindValue(':sexo',$sexo);
$consulta->bindValue(':telefone',$telefone);
$consulta->bindValue(':rua',$rua);
$consulta->bindValue(':municipio',$municipio);
$consulta->bindValue(':complemento',$complemento);
$consulta->bindValue(':logi',$login);
$consulta->execute();

if($consulta->rowCount() > 0){
    return 1;
}
else{
    return 0;
}

}

?>