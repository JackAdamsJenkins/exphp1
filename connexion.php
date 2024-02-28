<?php  
$message = null;

// Je test si j'ai des données en URL
if(!empty($_GET["logout"])){
    // efface les cookies
    setcookie("isLoggedIn", null, -1);

    // Redirige à nouveau sur la page de connexion, sans le get
    header("Location: connexion.php");
}

if(isset($_POST["submit"])){
    // On vérifie si les données login et pass sont renseignées
    if(!empty($_POST["login"]) && !empty($_POST["pass"])){
        // Les données sont renseingées, on vérifie la correspondance
        $loginCookie = isset($_COOKIE["login"]) ? $_COOKIE["login"] : null;
        $passCookie = isset($_COOKIE["pass"]) ? $_COOKIE["pass"] : null;

        // Si login et pass correspondent
        if($loginCookie == $_POST["login"] && 
            password_verify($_POST["pass"], $passCookie)){

                // on se connecte
                setcookie("isLoggedIn", true, time() + 3600);
                
                // Redirection sur la page profile
                header('location: profil.php');
        } else {
            $message = '<p style="color:red">Le login et/ou le mot de passe ne correspondent pas</p>';
        }

   } else {
        $message = '<p style="color:red">Veuillez renseigner le login et le passe</p>';
   }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <?=$message ?>
    <?php include "header.php"; ?>

    <form action="#" method="post">
        <label for="login">Nom d'utilisateur : </label>
        <input type="text" name="login" id="login" required>

        <label for="pass">Mot de passe :</label>
        <input type="password" name="pass" id="pass">
        
        <input type="submit" value="Se connecter" name="submit">
    </form>
</body>
</html>