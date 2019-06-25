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
    $senha = md5($_REQUEST["senha"]);
    $Csenha = md5($_REQUEST["Csenha"]);


    //Verificando dados
    
    if(MesmoEmail($email) == 1){
        echo "Email já cadastrado";
    }
    elseif(MesmoLogin($login) == 1){
        echo "Login já cadastrado";
    }
    elseif(MesmoCpf($cpf) == 1){
        echo "Cpf já cadastrado";
    }elseif(CpfValido($cpf)==false){
        echo "Cpf invalido";
    }elseif($senha != $Csenha){
        echo "Senha diferente";
    }else{
    

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
    
    
}
    //fechando conexão

    //mysqli_close($con);

?>

</body>
</html>
