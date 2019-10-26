<?php
//Criando conexao
set_time_limit(0);
ignore_user_abort(1);
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
