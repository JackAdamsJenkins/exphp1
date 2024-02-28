<?php  
$message = null;

if(isset($_POST["submit"])){
    if(!empty($_POST["login"]) && !empty($_POST["pass"])){
        setcookie("login", $_POST["login"], time() + 3600 * 24 * 30);
        $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
        setcookie("pass", $pass, time() + 3600 * 24 * 30);
        $message = '<p style="color:green;">Inscription réussie. Veuillez vous <a href="connexion.php">connecter</a>.</p>';
    } else {
        $message = '<p style="color:red;">Vous devez renseigner le login et le mot de passe</p>';
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
<?php include "header.php"; ?>

    <?=$message ?>

    <form action="#" method="post">
        <label for="login">Nom d'utilisateur : </label>
        <input type="text" name="login" id="login" required>

        <label for="pass">Mot de passe :</label>
        <input type="password" name="pass" id="pass">
        
        <input type="submit" value="S'enregistrer" name="submit">
    </form>
</body>
</html>