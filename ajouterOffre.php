<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $base_de_donnees = "etudjobweb";
    $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
    if (!$connexion) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }

    $id_utilisateur = $_SESSION['id_user'];
    $titre = $_POST['Titre'];
    $categorie = $_POST['categorie'];
    $lieu = $_POST['lieu'];
    $description = $_POST['desc'];
    $requete_utilisateur = "SELECT tel, email FROM user WHERE id_user = '$id_utilisateur'";
    $resultat_utilisateur = mysqli_query($connexion, $requete_utilisateur);
    if (!$resultat_utilisateur) {
        die("Erreur dans la requête utilisateur : " . mysqli_error($connexion));
    }
    $row_utilisateur = mysqli_fetch_assoc($resultat_utilisateur);
    $tel = $row_utilisateur['tel'];
    $email = $row_utilisateur['email'];
    $requete = "INSERT INTO offre (id_user, titre, categorie, lieu, descrip, tel, email) VALUES ('$id_utilisateur', '$titre', '$categorie', '$lieu', '$description', '$tel', '$email')";
    if (mysqli_query($connexion, $requete)) {
        header("Location: Mesoffre.php");
        exit();
    } else {
        echo "Erreur : " . $requete . "<br>" . mysqli_error($connexion);
    }

    mysqli_close($connexion);
}
?>
