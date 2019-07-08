<?php
/* Library used: Sendgrid
 * API used: Sendgrid
 */

require "../../vendor/autoload.php";


//credentials
define("API_KEY", "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");
define("FROM_EMAIL", "danielmeijs@gmail.com");
define("SUBJECT", "Reservering");

$sendTo = 'danielmeijsspam@gmail.com';

$from = new SendGrid\Email(null, FROM_EMAIL);
$to = new SendGrid\Email(null, $sendTo);

$htmlContent = '<h3>Uw reservering is geslaagd!</h3><p>Hierbij laten wij u weten dat uw reservering succesvol in ons systeem staat!</p>';

// Create Sendgrid content
$content = new SendGrid\Content("text/html",$htmlContent);

// Create a mail object
$mail = new SendGrid\Mail($from, SUBJECT, $to, $content);

$sg = new \SendGrid(API_KEY);

$response = $sg->client->mail()->send()->post($mail);

if ($response->statusCode() == 202) {
    // Successfully sent
    echo 'Mail has been sent!';
} else {
    echo 'Something went wrong.';
}