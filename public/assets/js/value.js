let timestamps = [];
let values = [];
let myChart;

const value = () => {
  const urlParams = new URLSearchParams(window.location.search);
  const id = urlParams.get("id");
  fetch(`/controllers/form/ajax-value.php?id=${id}`)
    .then((response) => response.json())
    .then((data) => {
      timestamps = [];
      values = [];

      // On récupère les données nécessaires.
      data.forEach((item) => {
        timestamps.push(item.module_timestamp);
        values.push(item.module_value);
      });

      // Si myChart existe déjà, nous mettons à jour ses valeurs. Sinon, nous appelons le graphique de base.
      if (myChart) {
        myChart.data.labels = timestamps;
        myChart.data.datasets[0].data = values;
        myChart.update();
      } else {
        chart();
      }
    })
    .catch((error) => {
      console.error("Erreur", error);
    });
};

const chart = () => {
  const ctx = document.getElementById("myChart");
  myChart = new Chart(ctx, {
    type: "line",
    data: {
      labels: timestamps,
      datasets: [
        {
          label: "Température",
          data: values,
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
};

// On appelle value pour la mise en page de base lors du premier chargement.
value();

// Permet de mettre à jour le graphique toutes les secondes lorsque de nouvelles valeurs sont ajoutées.
setInterval(value, 1000);
