<?php

function is_input_empty(string $email, string $mot_de_passe)
{
    if (empty($email) || empty($mot_de_passe)) {
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


function is_user_wrong(bool|array $result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function is_mot_de_passe_wrong(string $mot_de_passe, string $hashed_mot_de_passe)
{
    if (!password_verify($mot_de_passe, $hashed_mot_de_passe)) {
        return true;
    } else {
        return false;
    }
}
