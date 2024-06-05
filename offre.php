<?php
$serveur = "localhost"; 
$utilisateur = "root"; 
$mot_de_passe = ""; 
$base_de_donnees = "etudjobweb"; 

$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}
$requete = "SELECT * FROM offre WHERE 1"; 
if (isset($_GET['categorie']) && $_GET['categorie'] != '0') {
    $categorie = mysqli_real_escape_string($connexion, $_GET['categorie']);
    $requete .= " AND categorie = '$categorie'";
}
if (isset($_GET['lieu']) && $_GET['lieu'] != '') {
    $lieu = mysqli_real_escape_string($connexion, $_GET['lieu']);
    $requete .= " AND lieu = '$lieu'";
}

$resultat = mysqli_query($connexion, $requete);
$html_offres = "";

if (mysqli_num_rows($resultat) > 0) {
    while ($row = mysqli_fetch_assoc($resultat)) {
        $html_offres .= "<div class='offre'>";
        $html_offres .= "<div class='part'>";
        $html_offres .= "<h3 class='titreOffre'>" . $row['titre'] . "</h3>";
        $html_offres .= "<div class='iconplusp'>";
        $html_offres .= "<img src='home/description.png' alt='' class='iconi' />";
        $html_offres .= "<p class='desc'>" . $row['descrip'] . "</p>";
        $html_offres .= "</div>";
        $html_offres .= "<div class='iconplusp'>";
        $html_offres .= "<img src='home/localisation.png' alt='' class='iconi' />";
        $html_offres .= "<p class='lieu'><strong>Lieu de l'offre:</strong> " . $row['lieu'] . "</p>";
        $html_offres .= "</div>";
        $html_offres .= "<div class='iconplusp'>";
        $html_offres .= "<img src='home/fixe.png' alt='' class='iconi' />";
        $html_offres .= "<p class='lieu'><strong>Tel:</strong> " . $row['tel'] . "</p>";
        $html_offres .= "</div>";
        $html_offres .= "<div class='iconplusp'>";
        $html_offres .= "<img src='home/email.png' alt='' class='iconi' />";
        $html_offres .= "<p class='lieu'><strong>Email:</strong> " . $row['email'] . "</p>";
        $html_offres .= "</div>";
        $html_offres .= "</div>";
        $html_offres .= "<div class='imageCat'>";
        $html_offres .= "<img src='home/Service_de_livraison.jpg' alt='image' class='imageint' />";
        $html_offres .= "</div>";
        $html_offres .= "</div>";
    }
} else {
    $html_offres = "Aucune offre disponible pour le moment.";
}
echo $html_offres;
mysqli_close($connexion);
?>
