<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../js/view_client.js"></script>
    <script src="../js/list_assurances.js"></script>
    <title>Dashboard Client</title>
</head>

<body class="text-gray-900 bg-gray-200 min-h-screen">
    <a href="dashboard_assurances.php" class="text-2xl text-indigo-500 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 underline">Dashboard Assurance</a>
    <form action="../includes/client/add_client.php" method="post" class="mt-4 w-1/2 p-4">
        <div class="mb-4">
            <label for="nom" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nom du client</label>
            <input type="text" name="nom" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Entrer le nom du client" required>
        </div>
        <div class="mb-4">
            <label for="prenom" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Prenom du client</label>
            <input type="text" name="prenom" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Entrer le prénom du client" required>
        </div>
        <div class="mb-4">
            <label for="addresse" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Adresse</label>
            <input type="text" name="addresse" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Addresse" required>
        </div>
        <div class="mb-4">
            <label for="telephone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Numero de telephone</label>
            <input type="num" name="telephone" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Numero de telephone" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
            <input type="email" name="email" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Email du client" required>
        </div>
        <div class="mb-4 flex flex-row gap-4" id="assurancesList"></div>
        <button type="submit" name="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Valider</button>
    </form>
    <div>
        <div class="p-4 flex">
            <h1 class="text-3xl">
                Clients
            </h1>
        </div>
        <div class="px-3 py-4 flex justify-center">
            <table class="w-full text-md bg-white shadow-md rounded mb-4" id="clientTable">
                <tbody>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Nom</th>
                        <th class="text-left p-3 px-5">prenom</th>
                        <th class="text-left p-3 px-5">Email</th>
                        <th class="text-left p-3 px-5">Adress</th>
                        <th class="text-left p-3 px-5">Telephone</th>
                        <th class="text-left p-3 px-5">Assurances</th>
                        <th></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>