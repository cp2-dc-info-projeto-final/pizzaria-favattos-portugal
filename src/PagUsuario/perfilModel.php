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

?>