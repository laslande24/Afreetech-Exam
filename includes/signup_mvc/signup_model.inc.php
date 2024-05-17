<?php

declare(strict_types=1);

function get_user(object $pdo, string $nom, string $prenom)
{
    $query = "SELECT nom, prenom FROM utilisateur WHERE nom = :nom AND prenom = :prenom";

    $statement = $pdo->prepare($query);

    $statement->bindParam(":nom", $nom);

    $statement->bindParam(":prenom", $prenom);

    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email)
{
    $query = "SELECT email FROM utilisateur WHERE email = :email";

    $statement = $pdo->prepare($query);

    $statement->bindParam(":email", $email);

    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $email, string $mot_de_passe, string $nom, string $prenom)
{
    $query = "INSERT INTO utilisateur (nom, prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)";

    $statement = $pdo->prepare($query);

    $option = [
        'cost' => 12
    ];

    $hashed_mot_de_passe = password_hash($mot_de_passe, PASSWORD_BCRYPT, $option);

    $statement->bindParam(":nom", $nom);
    $statement->bindParam(":prenom", $prenom);
    $statement->bindParam(":email", $email);
    $statement->bindParam(":mot_de_passe", $hashed_mot_de_passe);

    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}
