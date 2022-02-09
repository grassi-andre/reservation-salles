<link rel="stylesheet" href="style.css">




<ul id="ulheader" >

    <li><a href="index.php">Accueil</a></li>
    

                <?php if(!isset($_SESSION['id'])) {?>

                    
                    <li><a href="connexion.php">Connexion</a></li>
                    <li><a href="inscription.php">Inscription</a></li>
                
                
                

                <?php } 

                
                

                 else{?>
                    <li><a href="planning.php">Calendrier</a></li>
                    <li><a href="profil.php">Modifier Mon profil</a></li>
                    <li style="float:right"><a class="active" href="deconnexion.php">Deconnexion</a></li>
                    
                <?php }?>
            

                
</ul>
