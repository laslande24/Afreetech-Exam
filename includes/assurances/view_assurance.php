<?php
include '../../config/config.php';

$sql = "SELECT * FROM assurances";
$stmt = $pdo->query($sql);
$assurances = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($assurances);
?>
