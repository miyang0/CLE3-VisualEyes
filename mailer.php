<?php
//Recipient
$to = '1123843@hr.nl';

// Subject
$subject = 'Contact';

// Message
$message = '
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
  <p>Message</p>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
//$headers .= "From: 1123843@example.com\r\n";

// Mail it
mail($to, $subject, $message, $headers);
?>
