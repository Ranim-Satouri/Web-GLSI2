function verif() {
    var titre = document.forme.titre.value.trim();
    var categorie = document.forme.categorie.value;
    var lieu = document.forme.lieu.value;
    var description = document.forme.description.value.trim();

    if (!titre || categorie === "0" || lieu === "0" || !description) {
        alert("Veuillez remplir tous les champs.");
        return false;
    }
    if (categorie === "0") {
        alert("Veuillez sélectionner une catégorie.");
        return false;
    }

    if (lieu === "0") {
        alert("Veuillez sélectionner un lieu.");
        return false;
    }

    return true;
}


    
    


