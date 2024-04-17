const setList = () => {
  fetch("../../../controllers/form/ajax-list.php")
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      console.log(data);
    })
    .catch((error) => {
      console.error("error", error);
    });
};
