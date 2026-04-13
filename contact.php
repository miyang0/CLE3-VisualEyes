<?php

$success = false;
$errors = [];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $comment = $_POST['comment'];
    $subject = $_POST['subject'];

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
        if ($mail->renderEmail([
                'subject' => $subject,
                'toAddress' => '1123843@hr.nl',
                'toName' => 'Daniëlle Ruwaard',
                'altBody' => $comment,
                'bcc' => $email,
                'options' => [
                        'comment' => $comment,

                ]
        ])) {
            $success = ['email send'];
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

    <!--    begin van section voor formulier-->
    <!--Uitzoeken wat ik moet doen met de succes en error messages en of dit nodig is-->

    <?php \Utils\Components::successMessage($success);
    \Utils\Components::errorMessage($errors); ?>

    <section class="md:max-w-[1000px] md:m-auto">
        <div class="font-bold text-xl">Contact Form</div>

        <form method="post">
            <div class="md:flex md:justify-between md:grid md:grid-cols-3 gap-6">
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required class="bg-white rounded-md">
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required class="bg-white rounded-md">
                </div>

                <div>
                    <label for="number">Phone number</label>
                    <input type="tel" name="number" id="number" required class="bg-white rounded-md">
                </div>
            </div>

            <div class="flex flex-col">
                <label for="comment">Your message</label>
                <textarea class="bg-white rounded-md" name="comment" id="comment" required cols="30"
                          rows="10"></textarea>
            </div>

            <!--verzenden knop-->
            <!--            Is hier nog een div nodig?-->
            <div class="grid col-span-1 col-start-3">
                <button class="cta-button font-normal bg-white rounded-md flex justify-center p-1"
                        type="submit" name="submit">Send
                </button>
            </div>

        </form>
    </section>
</main>
</body>
</html>


