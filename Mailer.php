<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';

class Mailer
{
    private PHPMailer $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'danielleruwaard8@gmail.com';
        $this->mail->Password = 'wyfx fwof lcsl owoj';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 587;

        $this->mail->setFrom('danielleruwaard8@gmail.com', 'VisualEyes');
    }

    public function send(string $fromEmail, string $messageContent): bool
    {
        try {
            $this->mail->addAddress('danielleruwaard8@gmail.com');
            $this->mail->addReplyTo($fromEmail);

            $this->mail->isHTML(true);
            $this->mail->Subject = 'Contact Form';
            $this->mail->Body = "<p>$messageContent</p>";

            return $this->mail->send();

        } catch (Exception $e) {
            return false;
        }
    }
}
