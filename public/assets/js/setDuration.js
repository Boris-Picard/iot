const setDuration = () => {
  fetch("../../../controllers/form/ajax-duration.php", {
    method: "POST",
  })
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      document.getElementById("duration").innerHTML = data[0].duration;
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
