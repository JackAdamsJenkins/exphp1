<?php 
    $isLoggedIn = !empty($_COOKIE["isLoggedIn"]) ? $_COOKIE["isLoggedIn"] : false;
    // Si l'utilisateur n'est PAS connecté
    if(!$isLoggedIn){
       // Go to hell
       header('location: connexion.php');
    }

    // Une page profil, contenant :
    // Les données de login (login)
    // Un lien vers la page "Modification de profil"
    $nom = $_COOKIE["login"];
    $photo = !empty($_COOKIE["photo"]) ? '<img src="upload/'.$_COOKIE["photo"].'" >' : null;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <?php include "header.php"; ?>
    <h1>Bienvenue <?=$nom?></h1>
    <?=$photo?>
    <a href="edit.php">Changer le profile</a>


</body>
</html>