let formulaire = document.getElementById("formulaire");
let error_div = document.getElementById("error");

formulaire.addEventListener("submit", function(e) {
  let message_error = [];
  e.preventDefault();
  if (document.getElementById("nom").value == "") {
    message_error.push("saisir le nom");
  }
  if (document.getElementById("prenom").value == "") {
    message_error.push("saisir le prenom");
  }
  if (document.getElementById("email").value == "") {
    message_error.push("saisir le email");
  }
  if (message_error.length > 0) {
    let error_message = "";
    for (msg of message_error) {
      error_message += `<div class="alert alert-danger">${msg}</div>`;
    }
    error_div.innerHTML = error_message;
  }

  if (
    document.getElementById("nom").value != "" &&
    document.getElementById("prenom").value != "" &&
    document.getElementById("email").value != ""
  ) {
    formulaire.submit();
  }
});
