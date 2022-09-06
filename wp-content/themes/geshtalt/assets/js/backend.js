document.addEventListener("DOMContentLoaded", (event) => {
  const eventForm = document.querySelector(".js-event-form");

  eventForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const url = eventForm.getAttribute("action");
    const formData = new FormData(eventForm);

    axios.post(url, formData)
      .then(function (response) {
        console.log(response);
        if (response.status === 200) {
          eventForm.querySelectorAll("input").forEach(int => {
            int.value = "";
          })

          alert("Спасибо, с Вами свяжутся в ближайшее время");
        };
      })
      .catch(function (error) {
        console.error(error);
      });
  });

  const programForm = document.querySelector(".js-program-form");

  programForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const url = programForm.getAttribute("action");
    const formData = new FormData(programForm);

    axios.post(url, formData)
      .then(function (response) {
        console.log(response);
        if (response.status === 200) {
          programForm.querySelectorAll("input").forEach(int => {
            int.value = "";
          })

          alert("Спасибо, с Вами свяжутся в ближайшее время");
        };
      })
      .catch(function (error) {
        console.error(error);
      });
  });
});
