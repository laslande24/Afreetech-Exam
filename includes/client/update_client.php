<?php
session_start();
include '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['client_id'])) {
        echo "ID de client manquant ou session expirée";
        exit;
    }

    $id = $_SESSION['client_id']; 
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $addresse = $_POST['addresse'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];

    $sql = "UPDATE clients SET nom=:nom, prenom=:prenom, addresse=:addresse, telephone=:telephone, email=:email, updated_at=NOW() WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $id,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':addresse' => $addresse,
        ':telephone' => $telephone,
        ':email' => $email
    ]);

    unset($_SESSION['client_id']);

    echo "Client mis à jour avec succès.";
    header("Location: ../../pages/dashboard_client.php");
    die();
}
?>
