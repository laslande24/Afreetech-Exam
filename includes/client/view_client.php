<?php
include '../../config/config.php';

$sql = "SELECT clients.*, GROUP_CONCAT(assurances.type_assurance SEPARATOR ', ') AS assurances
        FROM clients
        LEFT JOIN client_assurance ON clients.id = client_assurance.client_id
        LEFT JOIN assurances ON client_assurance.assurance_id = assurances.id
        GROUP BY clients.id";
$stmt = $pdo->query($sql);
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($clients);
?>
