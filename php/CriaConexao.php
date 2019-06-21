<?php
function CriarConexao(){
$host ="127.0.0.1";
    $port = 3306;
    $user ="root";
    $password = "";
    $dbname = "favatto";
    
    $mysqli = new mysqli ($host, $user, $password, $dbname, $port)
    or die ('Não pôde conectar ao servidor' . mysqli_connect_error());

    return $mysqli;
}
?>