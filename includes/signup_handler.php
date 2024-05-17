<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];

    try {
        require_once '../config/config.php';
        require_once 'signup_mvc/signup_model.inc.php';
        require_once 'signup_mvc/signup_controller.inc.php';

        //ERROR HANDLERS
        $errors = [];

        if (is_input_empty($email, $mot_de_passe, $nom, $prenom)) {
            $errors["empty_field"] = "Tous les champs sont requis.";
        };

        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Email Invalid";
        };

        if (is_user_exist($pdo, $nom, $prenom)) {
            $errors["user_exist"] = "Ce compte existe déja";
        };

        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Cette email est déja utiliser";
        };

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signup_data = [
                "nom" => $nom,
                "prenom" => $prenom,
                "email" => $email

            ];

            $_SESSION["signup_data"] = $signup_data;

            header("Location: ../index.php");
            die();
        }

        create_user($pdo, $email, $mot_de_passe, $nom, $prenom);

        header("Location: ../index.php");

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
