<?php
//Liga o model ao view fornecendo as varáveis dados e idade
require_once("UsuarioModel.php");

    $dados = Pegardados($login);
    $idade = CalcularIdade($dados['data_nasc']);

?>