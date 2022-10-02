<?php
error_reporting(0);

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nome = utf8_encode($_POST['nome']);

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->isSMTP();

$mail->Host       = 'mail.lesmains.com.br';
$mail->SMTPSecure = "tls";
$mail->Port       = 465;
$mail->SMTPAuth   = true;
$mail->Username   = 'revendedoras@lesmains.com.br';
$mail->Password   = 'Za0ftaqr5qmT';

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