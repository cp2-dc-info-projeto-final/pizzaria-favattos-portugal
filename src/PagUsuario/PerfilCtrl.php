<?php
require_once("UsuarioModel.php");

    $dados = Pegardados($login);
    $idade = CalcularIdade($dados['data_nasc']);

?>