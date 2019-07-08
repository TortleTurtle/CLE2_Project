<?php
//phpmailer

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
include_once '../../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 'danielmeijs@gmail.com';                // SMTP username
        $mail->Password = 'hntfjudxaslyjuan';                     // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('danielmeijs@gmail.com', 'Daan');
        $mail->addAddress('danielmeijsspam@gmail.com', "Test");     // Add a recipient
        $mail->addReplyTo('danielmeijs@gmail.com', 'Daan');

        // Content
        $mail->isHTML(true);                                 // Set email format to HTML
        $mail->Subject = 'Reservering';
        $mail->Body = "<h2>Uw reservering is geslaagd!</h2><p>Hallo Daan Meijs,</br> Hierbij laten we u weten dat uw reservering succesvol in ons systeem is gezet!</p>";
        $mail->AltBody = "Hallo $vnaam $anaam uw reservering is geslaagd!";

        $mail->send();
        echo "<script type='text/javascript'>alert('De reservering is succesvol geplaatst');</script>";
    } catch (Exception $e) {
        echo "<script type='text/javascript'>alert('Er ging iets fout Mailer Error: {$mail->ErrorInfo}');</script>";
    }