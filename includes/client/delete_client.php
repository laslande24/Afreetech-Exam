<?php
include '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client_id = $_POST['id'];

    $sql = "DELETE FROM client_assurance WHERE client_id = :client_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':client_id' => $client_id]);

    $sql = "DELETE FROM clients WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $client_id]);

    echo "Client supprimée avec succès.";
}
?>
