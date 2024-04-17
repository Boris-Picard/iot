const setValue = () => {
  fetch("../../../controllers/form/ajax-setValue.php", {
    method: "POST",
  })
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      let moduleValue = document.getElementById("value");
      if (moduleValue) {
        moduleValue.innerHTML = data.module_value;
      }
    })
    .catch((error) => {
      console.error("error val : ", error);
    });
};

setInterval(() => {
  setValue();
}, 15000);
