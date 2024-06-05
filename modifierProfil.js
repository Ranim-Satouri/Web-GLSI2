function verif() {
    var nom = document.forme.nom.value.trim();
    var prenom = document.forme.prenom.value.trim();
    var email = document.forme.email.value.trim();
    var tel = document.forme.tel.value.trim();
    var datenai = document.forme.datenai.value.trim();
    var genre = document.querySelector('input[name="genre"]:checked').value; 
    var niveau = document.forme.niveau.value.trim();
    var etab = document.forme.etab.value.trim();
    var description = document.forme.des.value.trim();

    if (!nom || !prenom || !email || !tel || !datenai || !niveau || !etab || !description || !genre) {
      alert("Veuillez remplir tous les champs.");
      return false;
    }
  
    if (email.indexOf("@") === -1 || email.lastIndexOf(".") === -1 || email.substring(email.indexOf("@")+1 ,email.lastIndexOf(".")) === "" || email.substr(email.indexOf(".")+1) === ""  ) {
      alert("L'adresse e-mail n'est pas valide.");
      return false;
    }
    
    if (tel.length !== 8){
      alert("Le numéro de téléphone doit contenir exactement 8 chiffres.");
      return false;
    }
    var i=0;
    while (tel[i] >= '0' && tel[i] <= '9' && i < tel.length) {
        i++;
    }
    if(i != tel.length)
    {
        return false;
    }
    var year = new Date(datenai).getFullYear();
    if (year > 2006) {
        alert("La Date de Naissance n'est pas valide.");
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
  