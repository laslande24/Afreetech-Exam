var xhr = new XMLHttpRequest();
xhr.open("GET", "../includes/assurances/view_assurance.php", true);
xhr.onload = function () {
  if (xhr.status >= 200 && xhr.status < 300) {
    var assurances = JSON.parse(xhr.responseText);
    var tableBody = document.querySelector("#assurancesTable tbody");

    assurances.forEach(function (assurance) {
      var row = document.createElement("tr");
      row.innerHTML = `
                    <td class="p-3 px-5">${assurance.type_assurance}</td>
                    <td class="p-3 px-5">${assurance.prime}</td>
                    <td class="p-3 px-5">${assurance.duree}</td>
                    <td class="p-3 px-5 flex justify-end">
                        <a href="update_assurance_form.php?id=${assurance.id}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Modifier</a>
                        <button type="button" class="delete-btn text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Supprimer</button>
                    </td>
                `;
      tableBody.appendChild(row);

      document.querySelectorAll(".delete-btn").forEach((button) => {
        button.addEventListener("click", function () {
          var assuranceId = this.getAttribute("data-id");
          if (confirm("Voulez-vous vraiment supprimer cette assurance ?")) {
            deleteClient(assurance.id);
          }
        });
      });
    });
  } else {
    console.error("La requête a échoué");
  }
};
xhr.send();

function deleteAssurance(assuranceId) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../includes/assurances/delete_assurance.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {
      alert("Assurance supprimée avec succès");
      location.reload();
      console.error("La suppression a échoué");
    }
  };
  xhr.send("id=" + assuranceId);
}
