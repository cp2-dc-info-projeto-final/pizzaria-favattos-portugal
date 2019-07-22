<?php 

session_start();
require_once("../Funcoes/CriaConexao.php");
require_once("PerfilModel.php");

if(!isset($_SESSION["logi"])){
  header("location: ../Login/Login.html");
}
else{
  $login = $_SESSION["logi"];
}

// Armazenando dados do usuário
$dados = PegarDados($login);
// Fazendo as alterações requisitadas
function AlterarDados($email, $sexo, $telefone, $endereco){
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

}
