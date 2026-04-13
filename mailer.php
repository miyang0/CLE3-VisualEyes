<?php

function sendMail($fromEmail, $messageContent)
{
    $to = '1123843@hr.nl';
    $subject = 'Contact Form';

    $message = "
    <html>
    <body>
        <p>$messageContent</p>
        <p>From: $fromEmail</p>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    return mail($to, $subject, $message, $headers);
}
