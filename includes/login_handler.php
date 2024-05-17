<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];

    try {
        require_once '../config/config.php';
        require_once 'login_mvc/login_model.inc.php';
        require_once 'login_mvc/login_controller.inc.php';

        //ERROR HANDLERS
        $errors = [];

        if (is_input_empty($email, $mot_de_passe)) {
            $errors["empty_field"] = "All fields are required. Please fill your fields";
        };

        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used";
        };

        $result = get_user($pdo, $email);

        if (is_user_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect email or mot_de_passe";
        }

        if (!is_user_wrong($result) && is_mot_de_passe_wrong($mot_de_passe, $result["mot_de_passe"])) {
            $errors["mot_de_passe_incorrect"] = "Incorrect mot_de_passe";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_login"] = $errors;

            header("Location: ../index.php");
            die();
        }

        $new_session_id = session_create_id();

        $session_id = $new_session_id . "_" . $result["id"];

        session_id($session_id);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_first_name"] = htmlspecialchars($result["first_name"]);

        $_SESSION["last_regeneration"] = time();

        header("Location: ../pages/dashboard_client.php");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Queried failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
