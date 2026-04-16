<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>VisualEyes</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<nav>
    <?php require_once "blocks/nav.php"; ?>
</nav>

<header>
    <h1>Manual</h1>
</header>

<section class="download">
    <h2 class="downloadH2">App and camera</h2>
    <p>You can download our extended guide on how to use the app and camera by clicking the button below!</p>

    <div>
        <button class="buttonDownload" aria-label="Download the manual">
            <a href="media/VisualEyes Manual.pdf" download>Download</a>
        </button>
    </div>
</section>

<footer>
    <?php require_once "blocks/footer.php"; ?>
</footer>

<script src="https://kit.fontawesome.com/2dba62d6df.js" crossorigin="anonymous"></script>
<script src="js/darkmode.js"></script>
</body>
</html>
