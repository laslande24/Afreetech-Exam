var xhr1 = new XMLHttpRequest();
xhr1.open("GET", "../includes/assurances/view_assurance.php", true);
xhr1.onload = function () {
  if (xhr1.status >= 200 && xhr1.status < 300) {
    var assurances = JSON.parse(xhr1.responseText);
    var assurancesList = document.getElementById("assurancesList");

    assurances.forEach(function (assurance) {
      var checkbox = document.createElement("input");
      checkbox.type = "checkbox";
      checkbox.id = "assurance_" + assurance.id;
      checkbox.name = "assurances[]";
      checkbox.value = assurance.type_assurance;

      var label = document.createElement("label");
      label.htmlFor = "assurance_" + assurance.id;
      label.appendChild(document.createTextNode(assurance.type_assurance));

      assurancesList.appendChild(checkbox);
      assurancesList.appendChild(label);
      assurancesList.appendChild(document.createElement("br"));
    });
  } else {
    console.error("La requête a échoué");
  }
  ("");
};
xhr1.send();
