<?php

require_once("../Funcoes/CriaConexao.php");

//Verifica se o email já foi cadastrado
function MesmoEmail($email){
    $con = CriarConexao();
    $dados = $con->prepare('SELECT email FROM cliente WHERE email = :email');
    $dados->bindValue(':email',$email);
    $dados->execute();

    if($dados->rowCount() != 0){
        return 1;
    }else{
        return 0;
    }
}

// verifica se o login já foi cadastrado

function MesmoLogin($login){
    $con = CriarConexao();
    $dados = $con->prepare('SELECT logi FROM cliente WHERE logi = :logi');
    $dados->bindValue(':logi',$login);
    $dados->execute(); 
    if($dados->rowCount() != 0){
        return 1;
    }else{
        return 0;
    }       
}

//verifica se o cpf já foi cadastrado

function MesmoCpf($cpf){
    $con = CriarConexao();
    $dados = $con->prepare('SELECT cpf FROM cliente WHERE cpf = :cpf');
    $dados->bindValue(':cpf',$cpf);
    $dados->execute();  
    if($dados->rowCount() != 0){
        return 1;
    }else{
        return 0;
    }
}
//validacao do cpf
function CpfValido($cpf){
    if ($cpf == '00000000000' || 
		$cpf == '11111111111' || 
		$cpf == '22222222222' || 
		$cpf == '33333333333' || 
		$cpf == '44444444444' || 
		$cpf == '55555555555' || 
		$cpf == '66666666666' || 
		$cpf == '77777777777' || 
		$cpf == '88888888888' || 
        $cpf == '99999999999') 
    {
        return false;
    }
        for ($t = 9; $t < 11; $t++) {
			
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return false;
            }else{
                return true;
            }
        }

}

function CadastraUsuario($nome,$data_nascimento,$sexo,$email,$login,$senha,$Csenha,$cpf,$municipio,$complemento,$rua,$tel){

    $error_list = [];
    if(MesmoEmail($email) == 1){
        $error_list[] = "Email já cadastrado";
    }
    if(MesmoLogin($login) == 1){
        $error_list[] = "Login já cadastrado";
    }
    if(MesmoCpf($cpf) == 1){
        $error_list[] = "Cpf já cadastrado";
    }
    if(CpfValido($cpf)==false){
        $error_list[] =  "Cpf invalido";
    }
    if($senha != $Csenha){
        $error_list[] = "Senhas diferentes";
    }else{
        $senha = password_hash($senha, PASSWORD_DEFAULT);
    }
    if (!empty($error_list)) {
        throw new Exception(implode('|', $error_list));
    }

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
