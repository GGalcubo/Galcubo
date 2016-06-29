<?php
require 'PHPMailerAutoload.php';

$fname = htmlspecialchars($_POST['fname']);
$email = htmlspecialchars($_POST['email']);
$subj = htmlspecialchars($_POST['subj']);
$mssg = htmlspecialchars($_POST['mssg']);

$message .= '';
	//$message .= '<html>';
$message .= '<body style="font-family:Tahoma, Geneva, sans-serif;">';
$message .= '<div style="background: #1b1b1b;width:800px;margin:0 auto;">';	
$message .= '<div style="color:black;background: #F9FAF7;width:800px;text-align:center">';

$message .= '<h3 style="margin:0px;padding:20px 0px">FORMULARIO</h3>';
$message .= '</div>';
//$message .= '<br/><br/>';
$message .= '<table rules="all" style="background: white;border-color: #666;" cellpadding="10" width="800">';
$message .= '<tr><td><strong>Nombre:</strong> </td><td>' . strip_tags($_POST['fname']) . '</td></tr>';
$message .= '<tr><td><strong>Email:</strong> </td><td>' . strip_tags($_POST['email']) . '</td></tr>';
$message .= '<tr><td><strong>Asunto:</strong></td><td>' . strip_tags($_POST['subj']) . '</td></tr>';
$message .= '<tr><td><strong>Mensaje:</strong></td><td>' . strip_tags($_POST['mssg'])  . '</td></tr>';
$message .= '</table>';
$message .= '</div>';
$message .= "</body>";

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'cristianconocimiento@gmail.com';                 // SMTP username
$mail->Password = 'blabla123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'cristianconocimiento@gmail.com';
$mail->FromName = 'G3';
$mail->addAddress('cristianoaltamirano@gmail.com', 'Guido');     // Add a recipient
// $mail->addReplyTo('cristianoaltamirano@gmail.com', 'Information');
// $mail->addCC('jerecapo@gmail.com');
// $mail->addBCC('lucio.bosco@gmail.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Formulario Web G3';
$mail->Body    = $message;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}