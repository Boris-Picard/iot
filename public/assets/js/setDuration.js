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
        dataCountElement.innerHTML = data[0].data_count + 1;
      }

      let lastUpdatedElement = document.getElementById("last_updated");
      if (lastUpdatedElement) {
        lastUpdatedElement.innerHTML = data[0].updated_at;
      }

      let isOperational = document.getElementById("operational");
      if (isOperational) {
        if (data[0].is_operational === 1) {
          isOperational.innerHTML = "En fonction";
          isOperational.classList.remove("text-danger");
          isOperational.classList.add("text-success");
        } else {
          isOperational.innerHTML = "Ne fonctionne pas";
          isOperational.classList.remove("text-success");
          isOperational.classList.add("text-danger");
        }
      }

      let toast = document.getElementById("toastOperational");
      if (toast) {
        if (data[0].is_operational === 0) {
          toast.classList.remove("d-none");
          toast.classList.add("d-block");
        } else {
          toast.classList.remove("d-block");
          toast.classList.add("d-none");
        }
      }
    })
    .catch((error) => {
      console.error("error val : ", error);
    });
};

setInterval(() => {
  setDuration();
}, 1000);
