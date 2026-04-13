<?php

class Components
{
    public static function errorMessage(?array $errors): void
    {
        if (!empty($errors)): ?>
            <section class="m-4 rounded w-fit flex bg-error mx-auto">
                <ul class="p-4 px-8 list-disc">
                    <?php foreach ($errors as $errorMessage): ?>
                        <li><?= htmlspecialchars($errorMessage); ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif;
    }

    public static function successMessage(?array $success): void
    {
        if (!empty($success)): ?>
            <section class="m-4 rounded w-fit flex bg-success mx-auto">
                <ul class="p-4 px-8 list-disc">
                    <?php foreach ($success as $successMessage): ?>
                        <li><?= htmlspecialchars($successMessage); ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif;
    }
}