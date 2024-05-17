var xhr = new XMLHttpRequest();
xhr.open("GET", "../includes/client/view_client.php", true);
xhr.onload = function () {
  if (xhr.status >= 200 && xhr.status < 300) {
    var clients = JSON.parse(xhr.responseText);
    var tableBody = document.querySelector("#clientTable tbody");

    clients.forEach(function (client) {
      var row = document.createElement("tr");
      row.innerHTML = `
          <td class="p-3 px-5">${client.nom}</td>
          <td class="p-3 px-5">${client.prenom}</td>
          <td class="p-3 px-5">${client.email}</td>
          <td class="p-3 px-5">${client.adresse}</td>
          <td class="p-3 px-5">${client.telephone}</td>
          <td class="p-3 px-5">${client.assurances}</td>
          <td class="p-3 px-5 flex justify-end">
              <a href="update_client_form.php?id=${client.id}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Modifier</a>
              <button type="button" class="delete-btn text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Supprimer</button>
          </td>
      `;
      tableBody.appendChild(row);

      document.querySelectorAll(".delete-btn").forEach((button) => {
        button.addEventListener("click", function () {
          var assuranceId = this.getAttribute("data-id");
          if (confirm("Voulez-vous vraiment supprimer ce client ?")) {
            deleteClient(client.id);
          }
        });
      });
    });
  } else {
    console.error("La requête a échoué");
  }
};
xhr.send();

function deleteClient(clientId) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../includes/client/delete_client.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {
      alert("Client supprimée avec succès");
      location.reload();
      console.error("La suppression a échoué");
    }
  };
  xhr.send("id=" + clientId);
}
