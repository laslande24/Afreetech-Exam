<?php

declare(strict_types=1);

function get_user($pdo, string $email)
{
    $query = "SELECT * FROM utilisateur WHERE email = :email";

    $statement = $pdo->prepare($query);

    $statement->bindParam(":email", $email);

    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}
