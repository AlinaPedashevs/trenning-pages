<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

//От кого письмо
$mail->setFrom('a.korobay@gmail.com', 'Alina');
$mail->addAddress('a.korobay@gmail.com');
$mail->Subject = 'Привет тебе тут написали';

$body = '<h1>Долгожданное письмо</h1>';

if(trim(!empty($_POST['name']))){
  $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['email']))){
  $body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
}

$mail->Body = $body;

//Отправляем
if (!$email->send()) {
  $message = 'Ошибка';
} else {
  $message = 'Данные отправлены!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>