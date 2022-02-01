<link rel="stylesheet" href="style.css">




<ul>

    <li><a href="index.php">Accueil</a></li>

                <?php if (!isset($_SESSION['id'])) {?>

                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="planning.php">Calendrier</a></li>
                

                <?php } ?>

                
                

                <?php if(isset($_SESSION['id'])){?>
                
                    <li><a href="profil.php">Modifier Mon profil</a></li>
                    <li><a href="planning.php">Calendrier</a></li>
                    <li><a href="deconnexion.php">Deconnexion</a></li>
                    
                <?php }?>
            
    <li style="float:right"><a class="active" href="livredor.php">À-propos</a></li>   
                
</ul>
