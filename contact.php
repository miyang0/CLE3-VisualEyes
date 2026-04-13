<?php

require_once 'Utils.php';
require_once 'mailer.php';

$success = [];
$errors = [];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $comment = $_POST['comment'];

    if ($name === '') {
        $errors[] = 'U still need to enter your name';
    }
    if ($email === '') {
        $errors[] = 'U still need to enter your e-mailadres';
    }
    if ($number === '') {
        $errors[] = 'U still need to enter your phone number';
    } elseif (strlen($number) > 20) {
        $errors[] = 'The phone number is too long';
    }
    if ($comment === '') {
        $errors[] = 'U did not enter your message';
    }

    if (empty($errors)) {
        if (sendMail($email, $comment)) {
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
<main>

    <nav>
        <?php require_once "blocks/nav.php"; ?>
    </nav>

    <header>
        <h1>Contact</h1>
    </header>

    <?php Components::successMessage($success); ?>
    <?php Components::errorMessage($errors); ?>

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
                    <input type="tel" name="number" required>
                </div>
            </div>

            <div class="form-group full-width">
                <label>Your message</label>
                <textarea name="comment" required></textarea>
            </div>

            <div class="form-actions">
                <button class="cta-button" type="submit" name="submit">
                    Send
                </button>
            </div>
        </form>
    </section>
</main>
</body>
</html>


