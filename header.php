<header>
    <nav>
        <ul>
            <?php 
            $isLoggedIn = !empty($_COOKIE["isLoggedIn"]) ? $_COOKIE["isLoggedIn"] : false;

            if($isLoggedIn){
                echo '<li><a href="profil.php">Profil</a></li>';
                echo '<li><a href="connexion.php?logout=true">Déconnexion</a></li>';
            } else {
                echo '<li><a href="connexion.php">Connexion</a></li>';
                echo '<li><a href="inscription.php">Inscription</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>