<?php
session_start();
include '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['assurance_id'])) {
        echo "ID de l'assurance manquant ou session expirée";
        exit;
    }

    $id = $_SESSION['assurance_id'];
    $type_assurance = $_POST['type_assurance'];
    $prime = $_POST['prime'];
    $duree = $_POST['duree'];

    $sql = "UPDATE assurances SET type_assurance=:type_assurance, prime=:prime, duree=:duree, updated_at=NOW() WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $id,
        ':type_assurance' => $type_assurance,
        ':prime' => $prime,
        ':duree' => $duree
    ]);

    unset($_SESSION['assurance_id']);

    echo "Assurance mise à jour avec succès.";
    header("Location: ../../pages/dashboard_assurances.php");
    die();
}
