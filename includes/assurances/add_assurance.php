<?php
include '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type_assurance = $_POST['type_assurance'];
    $prime = $_POST['prime'];
    $duree = $_POST['duree'];

    $sql = "INSERT INTO assurances (type_assurance, prime, duree) VALUES (:type_assurance, :prime, :duree)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':type_assurance' => $type_assurance,
        ':prime' => $prime,
        ':duree' => $duree
    ]);

    echo "Nouvelle assurance ajoutée avec succès.";
    header("Location: ../../pages/dashboard_assurances.php");
    die();
}
?>
