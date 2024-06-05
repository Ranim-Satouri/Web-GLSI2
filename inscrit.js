function verif() {
  var nom = document.forme.nom.value.trim();
  var prenom = document.forme.prenom.value.trim();
  var email = document.forme.email.value.trim();
  var tel = document.forme.tel.value.trim();
  var pwd = document.forme.pwd.value.trim();
  var pwdverif = document.forme.pwdverif.value.trim();
  var datenai = document.forme.datenai.value.trim();
  var genre = document.querySelector('input[name="genre"]:checked');
  var role = document.querySelector('input[name="role"]:checked');
  var niveau = document.forme.niveau.value.trim();
  var etab = document.forme.etab.value.trim();
  var description = document.forme.des.value.trim();

  if (!nom || !prenom || !email || !tel || !pwd || !pwdverif || !datenai) {
    alert("Veuillez remplir tous les champs.");
    return false;
  }

  if (
    email.indexOf("@") === -1 ||
    email.lastIndexOf(".") === -1 ||
    email.substring(email.indexOf("@") + 1, email.lastIndexOf(".")) === "" ||
    email.substr(email.indexOf(".") + 1) === ""
  ) {
    alert("L'adresse e-mail n'est pas valide.");
    return false;
  }

  if (tel.length !== 8) {
    alert("Le numéro de téléphone doit contenir exactement 8 chiffres.");
    return false;
  }
  var i = 0;
  while (tel[i] >= "0" && tel[i] <= "9" && i < tel.length) {
    i++;
  }
  if (i != tel.length) {
    return false;
  }

  if (pwd.length < 8) {
    alert("Le mot de passe doit contenir au moins 8 caractères.");
    return false;
  }

  var hasLetter = false;
  var hasNumber = false;
  for (var i = 0; i < pwd.length; i++) {
    var char = pwd[i];
    if (char >= "0" && char <= "9") {
      hasNumber = true;
    } else if ((char >= "a" && char <= "z") || (char >= "A" && char <= "Z")) {
      hasLetter = true;
    }
  }
  if (!hasLetter || !hasNumber) {
    alert("Le mot de passe doit contenir des chiffres et des lettres.");
    return false;
  }

  if (pwd !== pwdverif) {
    alert("Les mots de passe ne correspondent pas.");
    return false;
  }

  var year = new Date(datenai).getFullYear();
  if (year > 2006) {
    alert("La Date de Naissance n'est pas valide.");
    return false;
  }

  if (!genre || !role) {
    alert("Veuillez sélectionner une option pour le genre et le rôle.");
    return false;
  }

  return true;
}
// document.addEventListener('DOMContentLoaded', function() {
//   const radioEtudiant = document.getElementById('role');
//   const labelInscrit = document.getElementById('labelinput5');
//   const inputInscrit = document.getElementById('inputinscrit6');
//   console.log(radioEtudiant);
//   console.log(labelInscrit);
//   console.log(inputInscrit);
//     radioEtudiant.addEventListener('change', function() {
//       if (this.checked) {
//         labelInscrit.style.display = 'block';
//         inputInscrit.style.display = 'block';
//       }
//     });

//     // Cacher les infos si l'utilisateur sélectionne "non étudiant"
//     const radioNonEtudiant = document.getElementById('non-etudiant');
//     radioNonEtudiant.addEventListener('change', function() {
//       if (this.checked) {
//         labelInscrit.style.display = 'none';
//         inputInscrit.style.display = 'none';
//       }
//     });
//   });
// let x = document.getElementById("Genre").value;
// if (x === "student") {
//     // If the value is "Etudiant", append the HTML to the document
//     let div1 = document.createElement("div");
//     div1.setAttribute("class", "labelinput5");
//     div1.innerHTML = `
//         <label htmlFor="niveau">Niveau</label>
//         <input type="text" name="niveau" id="niveau" class="inputinscrit5" autoComplete="off" placeholder="Niveau" value="" onchange="handleChangeNiveau(event)" />
//         <p htmlFor="etab" class="petab">Établissement</p>
//         <input type="text" name="etab" id="etab" class="inputinscrit5" autoComplete="off" placeholder="Établissement" value="" onchange="handleChangeEtablissement(event)" />
//     `;
//     document.body.appendChild(div1);

//     let div2 = document.createElement("div");
//     div2.setAttribute("class", "inputinscrit6");
//     div2.innerHTML = `
//         <label htmlFor="description">Description</label>
//         <textarea id="description" name="des" class="inputinscrit6text" placeholder="Description" value="" onchange="handleChangeDescription(event)"></textarea>
//     `;
//     document.body.appendChild(div2);
// }
// Function to handle radio button change event
// Function to handle radio button change event
// Function to handle radio button change event
document.addEventListener("DOMContentLoaded", function () {
  function handleRadioChange(event) {
    var studentRadio = document.getElementById("studentRadio");
    var studentInputs = document.querySelectorAll(".studentInput");

    // If "student" radio button is checked, show student inputs; otherwise, hide them
    if (studentRadio.checked) {
      for (var i = 0; i < studentInputs.length; i++) {
        studentInputs[i].style.display = "block";
      }
    } else {
      for (var i = 0; i < studentInputs.length; i++) {
        studentInputs[i].style.display = "none";
      }
    }
  }

  // Add event listener to radio buttons
  var radioButtons = document.querySelectorAll(
    'input[type="radio"][name="role"]'
  );
  radioButtons.forEach(function (radioButton) {
    radioButton.addEventListener("change", handleRadioChange);
  });

  // Function to handle initial state of radio buttons
  function handleInitialState() {
    var studentRadio = document.getElementById("studentRadio");
    var studentInputs = document.querySelectorAll(".studentInput");
    var employerInputs = document.querySelectorAll(".employerInput");

    // Check if the "student" radio button is initially checked
    if (studentRadio.checked) {
      // Show student inputs
      for (var i = 0; i < studentInputs.length; i++) {
        studentInputs[i].style.display = "block";
      }
    } else {
      // Hide student inputs
      for (var i = 0; i < studentInputs.length; i++) {
        studentInputs[i].style.display = "none";
      }
      for (var i = 0; i < employerInputs.length; i++) {
        employerInputs[i].style.display = "block";
      }
    }
  }

  // Call handleInitialState function to set initial state
  handleInitialState();
  // Define handleChangeNiveau function
  function handleChangeNiveau(event) {
    // Your code to handle the change event for the "niveau" input goes here
    console.log("Niveau changed");
  }

  // Function to handle radio button change event
  function handleRadioChange(event) {
    var studentRadio = document.getElementById("studentRadio");
    var studentInputs = document.querySelectorAll(".studentInput");

    // If "student" radio button is checked, show student inputs; otherwise, hide them
    if (studentRadio.checked) {
      for (var i = 0; i < studentInputs.length; i++) {
        studentInputs[i].style.display = "block";
      }
    } else {
      for (var i = 0; i < studentInputs.length; i++) {
        studentInputs[i].style.display = "none";
      }
    }
  }
});
