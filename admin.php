<?php
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "etudjobweb";
$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}
$requete_utilisateurs = "SELECT * FROM user";
$resultat_utilisateurs = mysqli_query($connexion, $requete_utilisateurs);
if (!$resultat_utilisateurs) {
    die("Erreur dans la requête utilisateur : " . mysqli_error($connexion));
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Liste des Utilisateurs</h2>
    <table>
        <tr>
            <th class='id' >ID Utilisateur</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Role</th>
            <th class='action'>Action</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($resultat_utilisateurs)) {
            echo "<tr>";
            echo "<td>" . $row['id_user'] . "</td>";
            echo "<td>" . $row['nom'] . "</td>";
            echo "<td>" . $row['prenom'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "<td><form action='supprimeruser.php' class='form' method='post'><input type='hidden' name='id_utilisateur' value='" . $row['id_user'] . "'><input type='submit' value='Supprimer' class='deleteoffre'></form></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
mysqli_close($connexion);
?>
