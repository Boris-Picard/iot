const setList = () => {
  fetch("../../../controllers/form/ajax-list.php")
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      const tbody = document.querySelector("tbody");
      tbody.innerHTML = "";

      data.forEach((module) => {
        const row = document.createElement("tr");
        console.log(module);
        const durationInSeconds = module[0].duration;
        const minutes = Math.floor(durationInSeconds / 60);
        const hours = Math.floor(durationInSeconds / 3600);
        const days = Math.floor(durationInSeconds / (3600 * 24));
        row.innerHTML = `
          <th scope="row">${module[0].name}</th>
          <td>${module[0].measurement_type}</td>
          <td class="fw-bold ${
            module[0].is_operational === 1 ? "text-success" : "text-danger"
          }">${module[0].is_operational === 1 ? "En fonction" : "Erreur"}</td>
          <td>${module[0].module_value}</td>
          <td>${days} jours, ${hours % 24} heures, ${minutes % 60} minutes, ${
          durationInSeconds % 60
        } secondes</td>
          <td>${module[0].data_count + 1}</td>
          <td>${module[0].module_timestamp}</td>
          <td>
              <a href="/controllers/form/view-ctrl.php?id=${
                module[0].id_modules
              }"><i class="bi bi-eye btn btn-sm btn-light"></i></a>
              <a href="/controllers/form/update-ctrl.php?id=${
                module[0].id_modules
              }"><i class="bi bi-pencil-square btn btn-sm btn-light"></i></a>
              <a href="/controllers/form/delete-ctrl.php?id=${
                module[0].id_modules
              }"><i class="bi bi-trash-fill btn btn-sm btn-danger"></i></a>
          </td>
      `;

        tbody.appendChild(row); // Ajouter la ligne au tableau
      });
    })
    .catch((error) => {
      console.error("error", error);
    });
};

setInterval(() => {
  setList();
}, 1000);
