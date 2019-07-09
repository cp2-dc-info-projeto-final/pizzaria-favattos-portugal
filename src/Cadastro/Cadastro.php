<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
</head>

<body>

<?php

    require_once("../Funcoes/CriaConexao.php");
    require_once("ValidarCadastro.php");
    // RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO
    $nome = $_REQUEST["nome"];
    $email = $_REQUEST["email"];
    $tel = $_REQUEST["telefone"];
    $endereco = $_REQUEST["endereco"];
    $data_nascimento = $_REQUEST["dataN"];
    $cpf = $_REQUEST["cpf"];
    $sexo = $_REQUEST["sexo"];
    $login = $_REQUEST["login"];
    $senha = $_REQUEST["senha"];
    $Csenha = $_REQUEST["Csenha"];


    //Verificando dados
    $erros = [];

    if(MesmoEmail($email) == 1){
        $erros[]="Email já cadastrado";
    }
    if(MesmoLogin($login) == 1){
        $erros[]="Login já cadastrado";
    }
    if(MesmoCpf($cpf) == 1){
        $erros[]="Cpf já cadastrado";
    }
    if(CpfValido($cpf)==false){
        $erros[]="Cpf invalido";
    }
    if($senha != $Csenha){
        $erros[]="Senha diferente";
    }

    if(count($erros)==0){
    
    $senha = password_hash($_REQUEST["senha"], PASSWORD_DEFAULT);
        
    //Inserindo usuário

    $con = CriarConexao();
    $inserir = 'INSERT INTO cliente (nome, data_nasc, sexo, email, logi, senha, cpf, endereco, telefone)
              VALUES (:nome,:data_nascimento,:sexo,:email,:logi,:senha,:cpf,:endereco,:tel)';
    $stmt = $con->prepare($inserir);
    $stmt ->bindValue(':nome', $nome);
    $stmt ->bindValue(':data_nascimento', $data_nascimento);
    $stmt ->bindValue(':sexo', $sexo);
    $stmt ->bindValue(':email', $email);
    $stmt ->bindValue(':logi', $login);
    $stmt ->bindValue(':senha', $senha);
    $stmt ->bindValue(':cpf', $cpf);
    $stmt ->bindValue(':endereco', $endereco);
    $stmt ->bindValue(':tel', $tel);

    $stmt->execute();

    echo "Seu cadastro foi realizado com sucesso!<br>Agradecemos a atenção.";
    
    
}else{
    foreach ($erros as $erro){
		$text = "$text $erro | ";
		header('Location: PagCadastro.php?erros='.urlencode($text));
}
}

?>

</body>
</html>