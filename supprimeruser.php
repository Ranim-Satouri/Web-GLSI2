<?php
if (isset($_POST['id_utilisateur'])) {
    $id_utilisateur = $_POST['id_utilisateur'];
    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $base_de_donnees = "etudjobweb";
    $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
    if (!$connexion) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }
    $requete_suppression = "DELETE FROM user WHERE id_user = $id_utilisateur";
    $resultat_suppression = mysqli_query($connexion, $requete_suppression);
    if (!$resultat_suppression) {
        die("Erreur lors de la suppression de l'utilisateur : " . mysqli_error($connexion));
    } else {
        header("Location:admin.php");
        exit(); 
    }
    mysqli_close($connexion);
} else {
    header("Location: liste_utilisateurs.php");
    exit(); 
}
?>
