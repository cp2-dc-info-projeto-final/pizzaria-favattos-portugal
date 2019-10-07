<?php
//Liga o model ao view fornecendo as varáveis dados e idade
require_once("UsuarioModel.php");

function PegardadosCtrl($login) {
    return $dados = Pegardados($login);
}    

function CalcularIdadeCtrl($dados) {
    return $idade = CalcularIdade($dados['data_nasc']);
}
    

?>