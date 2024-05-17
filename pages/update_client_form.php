
<?php
session_start();
include '../config/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM clients WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $client = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$client) {
        echo "Compte client non trouvé";
        exit;
    }

    $_SESSION['client_id'] = $id; // Stocker l'ID du client dans la session
} else {
    echo "Compte du client manquant";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard Client</title>
</head>

<body class="text-gray-900 bg-gray-200 min-h-screen">
    <form action="../includes/client/update_client.php" method="post" class="mt-4 w-1/2 p-4">
        <div class="mb-4">
            <label for="nom" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nom du client</label>
            <input type="text" name="nom" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="<?php echo htmlspecialchars($client['nom']); ?>" required>
        </div>
        <div class="mb-4">
            <label for="prenom" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Prenom du client</label>
            <input type="text" name="prenom" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="<?php echo htmlspecialchars($client['prenom']); ?>" required>
        </div>
        <div class="mb-4">
            <label for="addresse" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Adresse</label>
            <input type="text" name="addresse" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="<?php echo htmlspecialchars($client['addresse']); ?>" required>
        </div>
        <div class="mb-4">
            <label for="telephone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Numero de telephone</label>
            <input type="num" name="telephone" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="<?php echo htmlspecialchars($client['telephone']); ?>" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
            <input type="email" name="email" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="<?php echo htmlspecialchars($client['email']); ?>" required>
        </div>
        <button type="submit" name="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Mettre a jour</button>
    </form>
</body>

</html>