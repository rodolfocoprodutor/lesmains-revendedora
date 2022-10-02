<?php
error_reporting(0);

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nome = utf8_encode($_POST['nome']);

require 'vendor/autoload.php';

$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = '127efe3c64258b';
$phpmailer->Password = '3010d093d9e6c5';

$mail->setFrom($mail->Username,"Lesmains");
$mail->addAddress('revendedoras@lesmains.com.br');
$mail->addReplyTo('revendedoras@lesmains.com.br');
$mail->Subject = "Novo cadastro em revendedora Lesmains";

$mail->isHTML(true);                                  //Set email format to HTML

$msg = "Nome:" . $nome;

$mail->Body = $msg;

if ( $mail->send()){
    echo "email enviado com sucesso!";
} else {
    echo "erro ao enviar o email" . $mail->ErrorInfo;
}