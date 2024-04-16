const setValue = () => {
  fetch("../../../controllers/form/ajax-setValue.php", {
    method: "POST",
  })
    .then((response) => {
      response.json();
    })
    .then((data) => {
      console.log(data);
    })
    .catch((error) => {
      console.error("error val : ", error);
    });
};

setInterval(() => {
  setValue();
}, 1000);
