<?php
include '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $assurance_id = $_POST['id'];

    $sql = "DELETE FROM client_assurance WHERE assurance_id = :assurance_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':assurance_id' => $assurance_id]);

    $sql = "DELETE FROM assurances WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $assurance_id]);

    echo "Assurance supprimée avec succès.";
}
?>
