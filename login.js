function verif() {
  var email = document.form.Email.value;
  var password = document.form.pwd.value;

  if (email === "") {
    alert("Veuillez taper votre adresse email");
    return false;
  }

  if (password === "") {
    alert("Veuillez taper votre mot de passe");
    return false;
  }

  if (
    email.indexOf("@") === -1 ||
    email.substr(email.indexOf("@") + 1).length === 0
  ) {
    alert("Adresse email incorrecte");
    return false;
  }

  if (password.length < 5) {
    alert("Mot de passe incorrecte");
    return false;
  }

  return true; // Ajouter cette ligne si tout est correct
}
