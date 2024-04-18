const setList = () => {
  fetch("../../../controllers/form/ajax-list.php")
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      let tbody = document.querySelector("tbody");
      tbody.innerHTML = "";

      data.forEach((module) => {
        let row = document.createElement("tr");

        module.forEach((mod) => {
          let durationInSeconds = mod.duration;
          let minutes = Math.floor(durationInSeconds / 60);
          let hours = Math.floor(durationInSeconds / 3600);
          let days = Math.floor(durationInSeconds / (3600 * 24));
          console.log(mod);
          row.innerHTML = `
            <th scope="row">${mod.name}</th>
            <td>${mod.measurement_type}</td>
            <td class="fw-bold ${
              mod.is_operational === 1 ? "text-success" : "text-danger"
            }">${mod.is_operational === 1 ? "En fonction" : "Erreur"}</td>
            <td >${mod.module_value}</td>
            <td>${days} jours, ${hours % 24} heures, ${minutes % 60} minutes, ${
            durationInSeconds % 60
          } secondes</td>
            <td>${mod.data_count + 1}</td>
            <td>${mod.module_timestamp}</td>
            <td>
              <a href="/controllers/form/view-ctrl.php?id=${
                mod.id_modules
              }"><i class="bi bi-eye btn btn-sm btn-light"></i></a>
              <a href="/controllers/form/update-ctrl.php?id=${
                mod.id_modules
              }"><i class="bi bi-pencil-square btn btn-sm btn-light"></i></a>
              <a href="/controllers/form/delete-ctrl.php?id=${
                mod.id_modules
              }"><i class="bi bi-trash-fill btn btn-sm btn-danger"></i></a>
            </td>
          `;
        });

        tbody.appendChild(row);
      });
    })
    .catch((error) => {
      console.error("error", error);
    });
};

setInterval(() => {
  setList();
}, 1000);
