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

      document.getElementById("duration").innerHTML = `${days} jours, ${
        hours % 24
      } heures, ${minutes % 60} minutes, ${durationInSeconds % 60} secondes`;
      document.getElementById("data_count").innerHTML = data[0].data_count;
      document.getElementById("last_updated").innerHTML = data[0].updated_at;
    })
    .catch((error) => {
      console.error("error val : ", error);
    });
};

setInterval(() => {
  setDuration();
}, 1000);
