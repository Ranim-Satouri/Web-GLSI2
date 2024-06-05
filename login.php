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
$email = mysqli_real_escape_string($connexion, $_POST['Email']);
$pwd = mysqli_real_escape_string($connexion, $_POST['pwd']);
$requete = "SELECT id_user, role FROM user WHERE email = ? AND pwd = ?";
$statement = mysqli_prepare($connexion, $requete);
mysqli_stmt_bind_param($statement, "ss", $email, $pwd);
mysqli_stmt_execute($statement);
$resultat = mysqli_stmt_get_result($statement);
if (mysqli_num_rows($resultat) > 0) {
    $row = mysqli_fetch_assoc($resultat);
    $userId = $row['id_user'];
    $role = $row['role'];
    $_SESSION['id_user'] = $userId;
    if ($role == "student") {
        header("Location: etudiant.html");  
        exit();
    }
    else if ($role == "admin"){
        header("Location: admin.php");  
        exit();
    }
    else {
        header("Location: employeur.html"); 
        exit();
    }
} else {
    
    header("Location: login.html?error=1"); 
    exit();
}

mysqli_stmt_close($statement); 
mysqli_close($connexion); 
?>
