function verif() {
    var oldPassword = document.forme.oldPassword.value.trim();
    var newPassword = document.forme.newPassword.value.trim();
    var newPasswordverif = document.forme.confirmPassword.value.trim();

    if (!oldPassword || !newPassword || !newPasswordverif) {
    alert("Veuillez remplir tous les champs.");
    return false;
    }

    if (newPassword.length < 8) {
    alert("Le nouveau mot de passe doit contenir au moins 8 caractères.");
    return false;
    }

    var hasLetter = false;
    var hasNumber = false;
    for (var i = 0; i < newPassword.length; i++) {
        var char = newPassword[i];
        if (char >= '0' && char <= '9') {
            hasNumber = true;
        } else if ((char >= 'a' && char <= 'z') || (char >= 'A' && char <= 'Z')) {
            hasLetter = true;
        }
    }    
    if  (!hasLetter || !hasNumber) {
        alert("Le mot de passe doit contenir des chiffres et des lettres.");
        return false;
    }
    

    if (!hasLetter || !hasNumber) {
    alert("Le nouveau mot de passe doit contenir à la fois des lettres et des chiffres.");
    return false;
    }

    if (newPassword !== newPasswordverif) {
    alert("Les nouveaux mots de passe ne correspondent pas.");
    return false;
    }

    return true;
}
