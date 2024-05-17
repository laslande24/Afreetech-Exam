<?php

declare(strict_types=1);


function check_signup_errors()
{
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION['errors_signup'];
        echo "<br>";

        foreach ($errors as $error) {
            echo "<p class='text-lg font-semibold text-red-500 hover:text-gray-300 underline'>" . $error . "</p>";
        }
        unset($_SESSION['errors_signup']);
    } else if (isset($_GET["success_signup"]) && $_GET["success_signup"]) {
        echo "<br>";
        echo "<p class='p-1 rounded text-2xl font-bold bg-green-700 text-yellow-500 spacing-4 text-center'>Votre compte à été bien crée!</p>";
        
    }
}
