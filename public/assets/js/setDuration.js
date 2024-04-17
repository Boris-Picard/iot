const setDuration = () => {
  fetch("../../../controllers/form/ajax-duration.php", {
    method: "POST",
  })
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      let durationInSeconds = data[0].duration;
      let minutes = Math.floor(durationInSeconds / 60);
      let hours = Math.floor(durationInSeconds / 3600);
      let days = Math.floor(durationInSeconds / (3600 * 24));

      // Vérifier si les éléments existent avant de définir leur contenu
      let durationElement = document.getElementById("duration");
      if (durationElement) {
        durationElement.innerHTML = `${days} jours, ${hours % 24} heures, ${
          minutes % 60
        } minutes, ${durationInSeconds % 60} secondes`;
      }

      let dataCountElement = document.getElementById("data_count");
      if (dataCountElement) {
        dataCountElement.innerHTML = data[0].data_count;
      }

      let lastUpdatedElement = document.getElementById("last_updated");
      if (lastUpdatedElement) {
        lastUpdatedElement.innerHTML = data[0].updated_at;
      }
    })
    .catch((error) => {
      console.error("error val : ", error);
    });
};

setInterval(() => {
  setDuration();
}, 1000);
