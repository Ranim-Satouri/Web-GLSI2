<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Offres</title>
    <link rel="stylesheet" href="Mesoffre.css">
</head>
<div class="navbar"> 
      <header class="header">
          <img src="img/etud.png" alt="" class="logo">
          <ul class="navlist">
          <li class="navitem">
              <a href="etudiant.html" class="link">
              <img src="img/maison.png" alt="Acceuil" class="icon">
              <p class="picon">Acceuil</p>
              </a>
          </li>
          <li class="navitem">
                    <a href="Mesoffre.php" class="link">
                    <p class="picon">Mes Offres</p>
                    </a>
                </li>
          <li class="navitem">
            <a href="profil.php" class="link">
            <img src="img/utilisateur.png" alt="Save Offres" class="icon">
            <p class="picon">Profil</p>
            </a>
          </li>
          <li class="navitem">
              <a href="Acceuil.html" class="link">
              <img src="img/bloquer.png" alt="Log Out" class="icon">
              <p class="picon">Deconnexion</p>
              </a>
          </li>
          </ul>
      </header>
  </div>

<body >
    <div class='home'>
          
    <div class='drop'>
        <h2 class='h2'>Vos Offres publiées </h2>
        <a href="ajouteroffre.html" class='addoffre'> 
            <button class='bouttonoffre'>Ajouter Offre</button>
        </a>
    </div>
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
    
    $id_utilisateur = $_SESSION['id_user'];

    $requete = "SELECT * FROM offre WHERE id_user = $id_utilisateur";
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
            $html_offres .= "<div class='bb'>";
            $html_offres .= "<form action='DeletOffre.php' method='post'>";
            $html_offres .= "<input type='hidden' name='id_offre' value='" . $row['id_offre'] . "'>";
            $html_offres .= "<input type='submit' value='Supprimer' class='deleteoffre'>";
            $html_offres .= "</form>";
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
    </div>
</body>
</html>
