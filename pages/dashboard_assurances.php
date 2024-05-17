<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../js/view_assurances.js"></script>
    <title>Dashboard Assurance</title>
</head>

<body class="text-gray-900 bg-gray-200 min-h-screen">
    <a href="dashboard_client.php" class="text-2xl text-indigo-500 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 underline">Dashboard Client</a>
    <form action="../includes/assurances/add_assurance.php" method="post" class="mt-4 w-1/2 p-4">
        <div class="mb-4">
            <label for="type_assurance" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Type d'assurance</label>
            <input type="text" name="type_assurance" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Entrer le nom du type d'assurance" required>
        </div>
        <div class="mb-4">
            <label for="prime" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Prime de l'assurance</label>
            <input type="number" name="prime" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Entrer la prime de l'assurance" required>
        </div>
        <div class="mb-4">
            <label for="duree" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Durée</label>
            <input type="text" name="duree" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Durée de l'assurance" required>
        </div>
        <button type="submit" name="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Valider</button>
    </form>
    <div>
        <div class="p-4 flex">
            <h1 class="text-3xl">
                Assurances
            </h1>
        </div>
        <div class="px-3 py-4 flex justify-center">
            <table class="w-full text-md bg-white shadow-md rounded mb-4" id="assurancesTable">
                <tbody>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Type</th>
                        <th class="text-left p-3 px-5">Prime</th>
                        <th class="text-left p-3 px-5">Durée</th>
                        <th></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>