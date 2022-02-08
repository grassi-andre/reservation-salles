<?php


session_start();  //start session
$bdd = new PDO('mysql:host=localhost;dbname=reservationsalles','root',"root");  // connexion a la BDD

if(isset($_SESSION['id'])){ 
    $requser = $bdd->prepare("SELECT * FROM utlisitateurs WHERE id = ?");
    $requser->execute(array($_SESSION['id']));//parcours le tableau 
   $user = $requser->fetch();//recup la ligne suivante d'un jeu de resultats 

   if(isset($_POST['newlogin']) AND !empty($_POST['newlogin']) AND $_POST['newlogin'] != $user['login'])//si newlogin existe et que il n'est pas vide et newlogin est diff de login  
		{
			$newlogin = htmlspecialchars($_POST['newlogin']);//je crée une variable a insérer 
			$insertlogin = $bdd->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");//prepa de la requete sql
			$insertlogin->execute(array($newlogin, $_SESSION['id']));//exe de la requete
			header('Location: profil.php?id='.$_SESSION['id']);//redirction
   }
   
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
    $mdp1 = sha1($_POST['newmdp1']);
    $mdp2 = sha1($_POST['newmdp2']);
    if($mdp1 == $mdp2) {
       $insertmdp = $bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
       $insertmdp->execute(array($mdp1, $_SESSION['id']));
       header('Location: profil.php?id='.$_SESSION['id']);
    } else {
       $msg = "Vos deux mdp ne correspondent pas !";
    }
   }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Profil</title>
</head>
<body id="imgfond4">
   <?php
      include('header.php')
   ?>
    
   <div class="profilform">

      <fieldset>

         <form action="" method="POST">

            <label for="login">Nouveau login</label><br>
            <input type="text" name="newlogin" placeolder="login" value="<?php echo @$_SESSION['login'] ?>" /><br /><br />
            <label for="password">Nouveau mot de passe</label><br>
            <input type="password" name="newmdp1" placeolder="password"> <br /><br />
            <label for="password">Confirmation nouveau mot de passe</label><br>
            <input type="password" name="newmdp2" placeolder="password2"> <br /><br />    
            <input type="submit" value="Mettre à jour mon profil !" /> <br /><br />
         
         </form>

      </fieldset>
  
   </div>

   <footer>
    <?php
    include('footer.html')
    ?>
</footer>
</body>

</html>