const value = () => {
  const urlParams = new URLSearchParams(window.location.search);
  const id = urlParams.get("id");
  fetch(`/controllers/form/ajax-value.php?id=${id}`)
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      console.log(data);
    })
    .catch((error) => {
      console.error("erreur", error);
    });
};

setInterval(value, 1000);
