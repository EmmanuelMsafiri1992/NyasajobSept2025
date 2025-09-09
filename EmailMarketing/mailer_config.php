<?php
// mailer_config.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Autoload PHPMailer

function getMailer() {
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'nyasajob.com'; // Set the SMTP server
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'info@nyasajob.com'; // SMTP username
        $mail->Password   = 'Admin2024@@';     // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    

        //Sender info
        $mail->setFrom('info@nyasajob.com', 'Nyasajob Career International');

        //Content settings
        $mail->isHTML(true);                                  
        $mail->Subject = 'New Job Notifications';

        return $mail;
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
        exit;
    }
}
?>
