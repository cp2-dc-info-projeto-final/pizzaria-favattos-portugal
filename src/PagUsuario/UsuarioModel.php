<?php

function PegarDados($login){
    //Armazenando dados do usário logado na variável $dados
    require_once("../Funcoes/CriaConexao.php");
    $con = CriarConexao();
    $consulta = $con->prepare("SELECT * FROM usuario WHERE email = :login or logi = :login");
    $consulta->bindValue(':login', $login);
    $consulta->execute();
    $dados = $consulta->fetch();
    return $dados;
}

function CalcularIdade($data) {
    //Data atual
    $dia = date('d');
    $mes = date('m');
    $ano = date('Y');
    //Data de nascimento
    $nascimento = explode('-', $data);
    $dianasc = ($nascimento[2]);
    $mesnasc = ($nascimento[1]);
    $anonasc = ($nascimento[0]);
    //Calculando idade
    $idade = $ano - $anonasc; 
    if ($mes < $mesnasc) 
    {
        $idade--;
        return $idade;
    }
    elseif ($mes == $mesnasc && $dia <= $dianasc) 
    {
        $idade--;
        return $idade;
    }
    else 
    {
        return $idade;
    }
}

function AlterarDados($email,$telefone,$rua,$municipio,$complemento,$login){

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
    $consulta = $con->prepare('UPDATE usuario SET email=:email, telefone=:telefone, municipio=:municipio, complemento=:complemento, rua=:rua WHERE logi = :logi');
    $consulta->bindValue(':email',$email);
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

function AlterarSenha($senhaA,$senha,$Csenha,$login){
    
    //Alterando e validando a troca de senha requerida 
    $error_list = [];
    $dados = PegarDados($login);
    if(empty($senhaA) || empty($senha) || empty($Csenha)){
        $error_list[] = "Os campos das senhas não podem ser nulos";
    }
    if(!password_verify($senhaA, $dados['senha']) || $Csenha != $senha){
        $error_list[] = "Senha atual incorreta ou as novas não coincidem";
    }
    if($senha === $senhaA){
        $error_list[] = "A senha nova deve ser diferente da atual";
    }else{
        $senha = password_hash($senha, PASSWORD_DEFAULT);
    }
    if (!empty($error_list)) {
        throw new Exception(implode('|', $error_list));
    }

    $con = CriarConexao();
    $consulta = $con->prepare('UPDATE usuario SET senha=:senha WHERE logi = :logi');
    $consulta->bindValue(':senha',$senha);
    $consulta->bindValue(':logi',$login);
    return $consulta->execute();

}

?>
