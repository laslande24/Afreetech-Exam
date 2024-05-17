<?php
session_start();
include '../config/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM assurances WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $assurance = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$assurance) {
        echo "Assurance non trouvé";
        exit;
    }
    $_SESSION['assurance_id'] = $id;
} else {
    echo "Assurance manquant";
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
    <form action="../includes/assurances/update_assurance.php" method="post" class="mt-4 w-1/2 p-4">
        <div class="mb-4">
            <label for="type_assurance" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Type d'assurance</label>
            <input type="text" name="type_assurance" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="<?php echo htmlspecialchars($assurance['type_assurance']); ?>" required>
        </div>
        <div class="mb-4">
            <label for="prime" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Prime de l'assurance</label>
            <input type="number" name="prime" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="<?php echo htmlspecialchars($assurance['prime']); ?>" required>
        </div>
        <div class="mb-4">
            <label for="duree" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Durée</label>
            <input type="text" name="duree" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="<?php echo htmlspecialchars($assurance['duree']); ?>" required>
        </div>
        <button type="submit" name="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Valider</button>
    </form>
</body>

</html>