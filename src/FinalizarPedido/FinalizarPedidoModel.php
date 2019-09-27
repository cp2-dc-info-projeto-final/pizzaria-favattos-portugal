<?php

function ReceberCarrinho(){
    require_once "../Inicial/CarrinhoCtrl.php";
    $ctrl = new CarrinhoCtrl();
    $carrinho = $ctrl->getCarrinho();
    return $carrinho;
}

function CadastraUsuario($nome,$data_nascimento,$sexo,$email,$login,$senha,$Csenha,$cpf,$municipio,$complemento,$rua,$tel){

    $con = CriarConexao();
    $inserir = 'INSERT INTO cliente (nome, data_nasc, sexo, email, logi, senha, cpf, municipio, complemento, rua, telefone)
              VALUES (:nome,:data_nascimento,:sexo,:email,:logi,:senha,:cpf,:municipio,:complemento,:rua,:tel)';
    $consulta = $con->prepare($inserir);
    $consulta ->bindValue(':nome', $nome);
    $consulta ->bindValue(':data_nascimento', $data_nascimento);
    $consulta ->bindValue(':sexo', $sexo);
    $consulta ->bindValue(':email', $email);
    $consulta ->bindValue(':logi', $login);
    $consulta ->bindValue(':senha', $senha);
    $consulta ->bindValue(':cpf', $cpf);
    $consulta ->bindValue(':municipio', $municipio);
    $consulta ->bindValue(':complemento', $complemento);
    $consulta ->bindValue(':rua', $rua);
    $consulta ->bindValue(':tel', $tel);

    return $consulta->execute();
}


?>