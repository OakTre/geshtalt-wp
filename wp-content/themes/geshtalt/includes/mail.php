<?php
// Проверка на пустые поля уровня PHP милорд разработчика
// if (empty($_POST["name"]) && empty($_POST["tel"]) && empty($_POST["email"])) {
//     header('HTTP/1.1 500 Internal Server');
//     header('Content-Type: application/json; charset=UTF-8');
//     die(json_encode(array('message' => 'FORM ERROR', 'code' => 1337)));
// };

// require_once('phpmailer/PHPMailerAutoload.php');

// $mail = new PHPMailer;
// $mail->CharSet = 'utf-8';

// $mail->isSMTP(); // Set mailer to use SMTP
// $mail->Host = 'smtp.mail.ru'; // Specify main and backup SMTP servers
// $mail->SMTPAuth = true;                           // Enable SMTP authentication
// $mail->Username = 'info@agro-kdw.com'; // Ваш логин от почты с которой будут отправляться письма
// $mail->Password = 'zfDVHYmgrigg2XDY5EYU'; // Ваш пароль от почты с которой будут отправляться письма
// $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров


// $mail->setFrom('info@agro-kdw.com', 'Kazan Digital Week'); // от кого будет уходить письмо?
// $mail->isHTML(true);


// $mail->addAddress($email);     // Кому будет уходить письмо
// $mail->Subject = "Заявка с сайта";
// // $mail->Body = $html_email_guest;

// if (!$mail->send()) {
//     echo "Error: " . $mail->ErrorInfo;
// } else {
//     echo "OK";
// }
