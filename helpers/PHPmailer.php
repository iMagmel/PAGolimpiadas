<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPmailer {
    public static function enviarCode($email, $codigo) {
        require '../vendor/autoload.php'; // o el autoload correcto de PHPMailer

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'skywayturismos@gmail.com';
        $mail->Password = 'nonl aqot gdjz vzdr';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('skywayturismos@gmail.com', 'SkyWay Turismos');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Código de verificación de cuenta';
        $mail->Body = "Tu código de verificación es: <b>$codigo</b>";

        $mail->send();
    }
}
?>