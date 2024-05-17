<?php
include '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $pdo->beginTransaction();

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $addresse = $_POST['addresse'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $noms_assurance = $_POST['assurances']; 
        // echo "type assurance".$noms_assurance[0];
        $sql = "INSERT INTO clients (nom, prenom, addresse, telephone, email) VALUES (:nom, :prenom, :addresse, :telephone, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':addresse' => $addresse,
            ':telephone' => $telephone,
            ':email' => $email
        ]);

        $client_id = $pdo->lastInsertId();

        $sql = "SELECT id FROM assurances WHERE type_assurance = :type_assurance";
        $stmt = $pdo->prepare($sql);

        foreach ($noms_assurance as $nom_assurance) {
            $stmt->execute([':type_assurance' => $nom_assurance]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $assurance_id = $result['id'];
                $sqlInsert = "INSERT INTO client_assurance (client_id, assurance_id) VALUES (:client_id, :assurance_id)";
                $stmtInsert = $pdo->prepare($sqlInsert);
                $stmtInsert->execute([
                    ':client_id' => $client_id,
                    ':assurance_id' => $assurance_id
                ]);
            } else {
                throw new Exception("Assurance type not found: " . $nom_assurance);
            }
        }

        $pdo->commit();
        echo "New client added successfully.";
        header("Location: ../../pages/dashboard_client.php");
        exit();
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Failed to add client: " . $e->getMessage();
    }
}
?>
