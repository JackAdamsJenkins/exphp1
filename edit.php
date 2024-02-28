<?php 
/*
    Avec PHP vous pouvez gérer les uploads
    Pour cela, il vous faut un formulaire en HTML
*/

$message = null;

// On vérifie si le formulaire a été envoyé
if(isset($_POST["submit"])){
    // var_dump($_FILES);
    // On vérifie si un fichier a été sélectionné et s'il n'y a pas d'erreur
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK){
        // On vérifie le type mime du fichier (on veut juste une image)
        $info = getimagesize($_FILES["image"]["tmp_name"]);

        // Est-ce qu'il y a un fichier, avec le bon type ?
        if($info != false && ($info["mime"] == "image/jpeg" || $info["mime"] == "image/png")){
            // Générer un nom de fichier unique                             récupère l'extension
            $nom_fichier = uniqid(). '.' .pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

            // Déplacer le fichier temporaire vers le dossier de destination
            //                    du dossier temporaire,        vers le dossier sur le serveur
            if(move_uploaded_file($_FILES["image"]["tmp_name"], 'upload/'.$nom_fichier)) {
                // Si on arrive ici, c'est un succès
                $message = '<p style="color:green;">La mise à jour a été effectuée</p>';

                // Enregistrer le nouveau login dans le cookie
                setcookie("login", $_POST["login"], time() + 3600 * 24);
                // Ajouter le nom du fichier dans le cookie image
                setcookie("photo", $nom_fichier, time() + 3600 * 24);
            } else {
                $message = '<p style="color:red;">Une erreur est survenue lors de l\'upload</p>';
            }

        } else {
            $message = '<p style="color:red;">Le fichier doit être au format jpeg ou png</p>';
        }
    } else {
        $message = '<p style="color:red;">Veuillez sélectionner un fichier</p>';
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le profil</title>
</head>
<body>
    <?php include "header.php"; ?>
    <h1>Modifier le profil</h1>
    <?=$message?>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="login">Nom d'utilisateur : </label>
        <input type="text" name="login" id="login" value="<?=$_COOKIE["login"]; ?>">
        <br>
        <label for="image">Sélectionnez une image</label>
        <input type="file" name="image" id="image">
        <br>
        <input type="submit" value="Mettre à jour" name="submit">
    </form>
</body>
</html>