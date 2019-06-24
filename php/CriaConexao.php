<?php
//Criando conexao
function CriarConexao(){
    
    $con = new PDO('mysql:host=localhost;
    dbname=favatto;charset=utf8',
    'root',
    ''
    );

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $con;
}
?>
