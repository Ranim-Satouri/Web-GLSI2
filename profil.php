<?php
session_start();
if (isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
    $user_id = $_SESSION['id_user'];
    $serveur = "localhost"; 
    $utilisateur = "root"; 
    $mot_de_passe = ""; 
    $base_de_donnees = "etudjobweb"; 

    $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
    if (!$connexion) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }
    $query = "SELECT * FROM user WHERE id_user = $user_id";
    $resultat = mysqli_query($connexion, $query);
    if ($resultat) {
        $utilisateur = mysqli_fetch_assoc($resultat);
    } else {
          echo("erreur de connection");
    }
    mysqli_close($connexion);
} else {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil</title>
  <link rel="stylesheet" href="profil.css">
</head>
<body>
  <div class="background">
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
    <div class="loginbody">
      <div class="tabcontent">
      <form class="mef" name='f1' action="modifier.php" method="post">
          <p class="p1inscrit">Votre profil</p>
          <div class="labelinput1">
          <div class="labelinput1">
            <label for="nom" class="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="<?php echo $utilisateur['nom']; ?>" class="inputinscrit1" readonly   >
          </div><br>
          <div class="labelinput1">
            <label for="prenom" class="prenom">Prénom</label>
            <input type="text" id="prenom"  name="prenom" value="<?php echo $utilisateur['prenom']; ?>" class="inputinscrit1"  readonly  >
          </div>
          <div class="labelinput1">
            <label for="email" class="email">Email</label>
            <input type="text" id="email" name="email" value="<?php echo $utilisateur['email']; ?>" class="inputinscrit1"  readonly >
          </div>
          <div class="labelinput1">
            <label for="tel" class="tel">Numéro de téléphone</label>
            <input type="text" id="tel" name="tel" value="<?php echo $utilisateur['tel']; ?>" class="inputinscrit1"  readonly >
          </div>
          <div class="labelinput1">
            <label for="dateNaissance" class="dateNaissance">Date de naissance</label>
            <input type="text" id="dateNaissance"  name="dateNaissance" value="<?php echo $utilisateur['datenaiss']; ?>" class="inputinscrit1"  readonly >
          </div>
          <div class="labelinput1">
            <label for="genre" class="genre">Genre</label>
            <label for="female">Female</label>
<input type="radio" id="female" name="genre" value="female" <?php if ($utilisateur['genre'] == "female") echo "checked"; ?>>

<label for="male">Male</label>
<input type="radio" id="male" name="genre" value="male" <?php if ($utilisateur['genre'] == "male") echo "checked"; ?> > </div>
          <div class="labelinput1">
            <label for="role" class="role">Rôle</label>
            <input type="text" id="role"  name="role"  value="<?php echo $utilisateur['role']; ?>" class="inputinscrit1"  readonly   >
          </div>
    
          
          </div>
          <button type="button" class="bottom2" onclick="window.location.href='modifierProfil.php'" >Modifier</button> 
        </form> 
      </div>
    </div> 
  </div>
</body>
</html>
