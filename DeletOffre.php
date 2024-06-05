<?php
session_start(); 
$serveur = "localhost"; 
$utilisateur = "root"; 
$mot_de_passe = ""; 
$base_de_donnees = "etudjobweb"; 

$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}


if(isset($_POST['id_offre'])) {
    
    $id_offre = $_POST['id_offre'];
    echo($id_offre );
    $requete_suppression = "DELETE FROM offre WHERE id_offre = $id_offre";
    $resultat_suppression = mysqli_query($connexion, $requete_suppression);
    if($resultat_suppression) {
        header("Location: Mesoffre.php");
        exit();
    } else {
        echo "Erreur lors de la suppression de l'offre.";
    }
}


mysqli_close($connexion);
?>
