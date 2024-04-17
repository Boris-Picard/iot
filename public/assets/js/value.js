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
      backgroundColors = [];

      // On récupère les données nécessaires.
      data.forEach((item) => {
        timestamps.push(item.module_timestamp);
        values.push(item.module_value);
        backgroundColors.push(item.module_value > 50 ? "red" : "green"); 
      });

      // Si myChart existe déjà, nous mettons à jour ses valeurs. Sinon, nous appelons le graphique de base.
      if (myChart) {
        myChart.data.labels = timestamps;
        myChart.data.datasets[0].data = values;
        myChart.data.datasets[0].pointBackgroundColor = backgroundColors;
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
          pointBackgroundColor: values.map((value) =>
            value > 50 ? "red" : "green"
          ),
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
      plugins: {
        tooltip: {
          callbacks: {
            title: function (context) {
              const dataIndex = context[0].dataIndex;
              if (values[dataIndex] > 50) {
                return "Erreur de température";
              } else {
                return null;
              }
            },
          },
        },
      },
    },
  });
};

// On appelle value pour la mise en page de base lors du premier chargement.
value();

// Permet de mettre à jour le graphique toutes les secondes lorsque de nouvelles valeurs sont ajoutées.
setInterval(value, 1000);
