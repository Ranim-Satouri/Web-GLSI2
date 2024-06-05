<?php
session_start(); 
if (!isset($_SESSION['id_user'])) {
    header("Location: connexion.php");
    exit(); 
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ancien_mot_de_passe = $_POST["oldpwd"];
    $nouveau_mot_de_passe = $_POST["newPassword"];
    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $base_de_donnees = "etudjobweb";
    $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
    if (!$connexion) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }
    $id_utilisateur = $_SESSION['id_user'];
    $requete_mot_de_passe = "SELECT pwd FROM user WHERE id_user = $id_utilisateur";
    $resultat_mot_de_passe = mysqli_query($connexion, $requete_mot_de_passe);
    if (!$resultat_mot_de_passe) {
        die("Erreur lors de la récupération du mot de passe : " . mysqli_error($connexion));
    }
    if (mysqli_num_rows($resultat_mot_de_passe) == 1) {
        $row = mysqli_fetch_assoc($resultat_mot_de_passe);
        $mot_de_passe_actuel = $row["pwd"];
        if ($ancien_mot_de_passe == $mot_de_passe_actuel) {
            $requete_mise_a_jour = "UPDATE user SET pwd = '$nouveau_mot_de_passe' WHERE id_user = $id_utilisateur";
            $resultat_mise_a_jour = mysqli_query($connexion, $requete_mise_a_jour);
            if (!$resultat_mise_a_jour) {
                die("Erreur lors de la mise à jour du mot de passe : " . mysqli_error($connexion));
            } else {
                echo "<script>alert('Mot de passe mis à jour avec succès.'); window.location.href = 'profil.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Ancien mot de passe incorrect. Veuillez réessayer.'); window.location.href = 'modifierMotDePasse.html';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Utilisateur introuvable.'); window.location.href = 'profil.php';</script>";
        exit();
    }
}
?>
