<?php

class Errorhandler
{
    public static function errorMessage(?array $errors): void
    {
        if (!empty($errors)): ?>
            <section class="bg-error">
                <ul class="list">
                    <?php foreach ($errors as $errorMessage): ?>
                        <li><?= $errorMessage; ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif;
    }

    public static function successMessage(?array $success): void
    {
        if (!empty($success)): ?>
            <section class="bg-success">
                <ul class="list">
                    <?php foreach ($success as $successMessage): ?>
                        <li><?= $successMessage; ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif;
    }
}