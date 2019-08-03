<?php

function PegarDados($login){
    //Armazenando dados do usário logado na variável $dados
    require_once("../Funcoes/CriaConexao.php");
    $con = CriarConexao();
    $consulta = $con->prepare("SELECT * FROM cliente WHERE email = :login or logi = :login");
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

function AlterarDados($email, $sexo, $telefone, $endereco){

    if(!isset($_SESSION["logi"])){
        header("location: ../Login/LoginView.php");
      }
      else{
        $login = $_SESSION["logi"];
      }
    // Armazenando dados do usuário
    $dados = PegarDados($login);
    if($email == ""){
        $email = $dados['email'];
    }
    if($telefone == ""){
        $telefone = $dados['telefone'];
    }
    if($endereco == ""){
        $endereco = $dados['endereco'];
    }
    
    $con = CriarConexao();
    $consulta = $con->prepare('UPDATE cliente SET email=:email, sexo=:sexo, telefone=:telefone, cidade=:cidade, complemento=:complemento, rua=:rua WHERE logi = :logi');
    $consulta->bindValue(':email',$email);
    $consulta->bindValue(':sexo',$sexo);
    $consulta->bindValue(':telefone',$telefone);
    $consulta->bindValue(':rua',$rua);
    $consulta->bindValue(':cidade',$cidade);
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