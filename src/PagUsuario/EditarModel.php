<?php 

require_once("../Funcoes/CriaConexao.php");
require_once("PerfilModel.php");

// Fazendo as alterações requisitadas 
function AlterarDados($email, $sexo, $telefone, $endereco){

    if(!isset($_SESSION["logi"])){
        header("location: ../Login/Login.html");
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
    $consulta = $con->prepare('UPDATE cliente SET email=:email, sexo=:sexo, telefone=:telefone, endereco=:endereco WHERE logi = :logi');
    $consulta->bindValue(':email',$email);
    $consulta->bindValue(':sexo',$sexo);
    $consulta->bindValue(':telefone',$telefone);
    $consulta->bindValue(':endereco',$endereco);
    $consulta->bindValue(':logi',$login);

    return $consulta->execute();

}
