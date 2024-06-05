<?php
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
$pwd = $_POST['pwd'];
$pwdverif = $_POST['pwdverif'];
$datenai = $_POST['datenai'];
$genre = $_POST['genre'];
$role = $_POST['role'];
$requete = "INSERT INTO user (nom, prenom, email, pwd, datenaiss, genre, role,tel) VALUES ('$nom', '$prenom', '$email', '$pwd', '$datenai', '$genre', '$role', '$tel')";
if (mysqli_query($connexion, $requete)) {
    echo "Inscription réussie.";
    header("Location: login.html"); 
    exit();
} else {
    echo "Erreur d'inscription : " . mysqli_error($connexion);
}
mysqli_close($connexion);