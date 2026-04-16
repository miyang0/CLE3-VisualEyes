<?php

require_once 'Errorhandler.php';
require_once 'Mailer.php';

$success = [];
$errors = [];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    if ($name === '') {
        $errors[] = 'U still need to enter your name';
    }
    if ($email === '') {
        $errors[] = 'U still need to enter your e-mailadres';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address';
    }
    if ($number === '') {
        $errors[] = 'U still need to enter your phone number';
    } else {

        $cleanNumber = str_replace(' ', '', $number);

        if (!ctype_digit($cleanNumber)) {
            $errors[] = 'Phone number may only contain numbers';
        } elseif (strlen($cleanNumber) < 8 || strlen($cleanNumber) > 15) {
            $errors[] = 'Phone number must be between 8 and 15 digits';
        }
    }
    if ($message === '') {
        $errors[] = 'U did not enter your message';
    }

    if (empty($errors)) {
        $mailer = new Mailer();
        $emailBody = "
<p><strong>Name:</strong> $name</p>
<p><strong>Email:</strong> $email</p>
<p><strong>Phone number:</strong> $number</p>
<hr>
<p><strong>Message:</strong></p>
<p>$message</p>
";

        if ($mailer->send($email, $emailBody)) {
            $success = ['Email sent'];
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VisualEyes</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>


<nav>
    <?php require_once "blocks/nav.php"; ?>
</nav>
<main>
    <header>
        <h1>Contact</h1>
        <p class="contactDescription">Do u have a question, did something go wrong or do u need help with something? We
            will do our best to get back to u
            as soon as possible after u fill in this form.</p>
    </header>

    <?php Errorhandler::successMessage($success); ?>
    <?php Errorhandler::errorMessage($errors); ?>

    <section class="contact-container">
        <div class="form-title">Contact Form</div>

        <form method="post">
            <div class="form-row">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label>Phone number</label>
                    <input type="tel" name="number" placeholder="06 12345678" required>
                </div>
            </div>

            <div class="form-group full-width">
                <label>Your message</label>
                <textarea name="message" required></textarea>
            </div>

            <div class="form-actions">
                <button class="submit-button" type="submit" name="submit">
                    Send
                </button>
            </div>
        </form>
    </section>
</main>

<footer>
    <?php require_once "blocks/footer.php"; ?>
</footer>

</body>
</html>


