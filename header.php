<link rel="stylesheet" href="style.css">




<ul>

    <li><a href="index.php">Accueil</a></li>

                <?php if (!isset($_SESSION['id'])) {?>

                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                

                <?php } ?>

                
                

                <?php if(isset($_SESSION['id'])){?>
                
                    <li><a href="profil.php">Modifier Mon profil</a></li>
                    <li><a href="commentaire.php">Commentaire</a></li>
                    <li><a href="deconnexion.php">Deconnexion</a></li>
                    
                <?php }?>
    <li><a href="livreor.php">Livre d'or</a></li>        
    <li style="float:right"><a class="active" href="livredor.php">À-propos</a></li>   
                
</ul>
