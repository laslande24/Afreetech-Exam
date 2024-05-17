<?php

declare(strict_types=1);

function is_input_empty(string $email, string $mot_de_passe, string $nom, string $prenom)
{
    if (empty($email) || empty($mot_de_passe) || empty($nom) || empty($prenom)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_user_exist(object $pdo, string $nom, string $prenom)
{
    if (get_user($pdo, $nom, $prenom)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $email, string $mot_de_passe, string $nom, string $prenom)
{
    set_user($pdo, $email, $mot_de_passe, $nom, $prenom);
}
