<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['enviar'])) {

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.lesmains.com.br';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'revendedoras@lesmains.com.br';                     //SMTP username
        $mail->Password   = 'Za0ftaqr5qmT';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('revendedoras@lesmains.com.br', 'Mailer');
        $mail->addAddress('revendedoras@lesmains.com.br', 'Lesmains');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('revendedoras@lesmains.com.br', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';

        $body = "Nome: ". $_POST['nome']."<br>";
                "E-mail: ". $_POST['email']."<br>";
                "Whatsapp: ". $_POST['whatsapp']."<br>";
                "CEP: ". $_POST['cep']."<br>";
                "Rua: ". $_POST['rua']."<br>";
                "Número: ". $_POST['numero']."<br>";
                "Cidade: ". $_POST['cidade']."<br>";
                "Estado: ". $_POST['estado'];        

        $mail->Body    = $body;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Dados de cadastro enviado com sucesso';
    } catch (Exception $e) {
        echo "Erro ao enviar dados de cadastro: {$mail->ErrorInfo}";
    }
}else {
    echo "Erro ao enviar email pelo link use a página do site"
}
