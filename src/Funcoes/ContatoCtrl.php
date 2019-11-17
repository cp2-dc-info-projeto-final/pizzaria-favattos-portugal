<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		$email = $_POST['email'];
		$mensagem = $_POST['mensagem'];
		
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "jguilhermepasco@gmail.com");
        $subject = "Mensagem de contato - Favatto";
        $to = new SendGrid\Email(null, "jguilhermepasco@gmail.com");
        $content = new SendGrid\Content("text/html", "Olá Admin, <br><br>Nova mensagem de contato<br><br>Email: $email <br>Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso";
		
        ?>
    </body>
</html>