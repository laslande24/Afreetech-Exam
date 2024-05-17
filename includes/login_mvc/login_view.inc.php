<?php

declare(strict_types=1);

function is_user_logged_in()
{
    if (isset($_SESSION["user_id"])) {
        return true;
    } else {
        return false;
    }
}

function check_login_errors()
{
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION['errors_login'];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<p class='text-lg bg-red-500 text-yellow-500 p-1 text-center'>" . $error . "</p>";
        }

        unset($_SESSION['errors_login']);
    } else if (isset($_GET["login"]) && $_GET["login"] == "success") {
        header("Location: ../pages/dashboard.php");
    }
}
