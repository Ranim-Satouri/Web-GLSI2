<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id_user'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $base_de_donnees = "etudjobweb";
    $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
    if (!$connexion) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }

     $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $datenaiss = $_POST['dateNaissance'];
    $genre = $_POST['genre'];
    $role = $_POST['role'];
    $query = "UPDATE user SET nom='$nom', prenom='$prenom', email='$email', tel='$tel',datenaiss='$datenaiss',genre='$genre' WHERE id_user=$user_id";
    if (mysqli_query($connexion, $query)) {
        header("Location: profil.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour du profil : " . mysqli_error($connexion);
    }
    mysqli_close($connexion);
}
