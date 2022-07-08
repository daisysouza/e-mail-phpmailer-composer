<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>enviar e-mail</title>
</head>
<body>
    <?php
        //**//Importo a classe PHPMailer de forma global com namespace
    //These must be at the top of your script, not inside a function */
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //incluir autoload Composer
    require 'lib/vendor/autoload.php';

    //instanciar a classe phpmailer com new
    $mail = new PHPMailer(true);
    
    //try catch
    try {
        //configurações do servidor - credenciais da hospedagem
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '24252bd666bd84';                     //SMTP username
    $mail->Password   = '659fbb4e3544b7';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 2525;      
        

     //Destinatário
     $mail->setFrom('atendimento@email.com', 'Atendimento');   //quem está enviando
     $mail->addAddress('daisy@email.net', 'Daisy');           //destinatário - nome e email
     $mail->addAddress('daisy@example.com');                  //só email - nome é opcional
     
     //Para enviar cópia
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Para enviar anexo
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Conteúdo
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Titulo do email';               //Assunto
    $mail->Body    = 'mensagem <b>in bold!</b>';      //mensagem em negrito
    $mail->AltBody = 'Mensagem somente texto.\n texto da segunda linha';      //mensagem sem html com \n para quebra de linha
    
    $mail->send();

        echo 'E-mail enviado com sucesso';
    } catch (Exception $e) {
        echo "Erro: a mensagem não pode ser enviada. Erro PHPMailer: {$mail->ErrorInfo}"; //não aprensentar esse erro
    }   echo "Erro: a mensagem não pode ser enviada.<br>"; //esse é o que irá para produção
    ?>
</body>
</html>