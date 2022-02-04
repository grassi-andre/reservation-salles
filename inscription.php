<?php
//id sql
session_start();
require 'bdd.php';
// $serveur = "localhost";
// $dbname = "reservationsalles";
// $user = "root";
// $pass = "root";


// try{ 
//     //Connexion BDD 
//     $log = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
//     $log->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }
// // Erreur
// catch(PDOException $e){
//     echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
// }


    @$login = $_POST['login'];
    @$password = sha1($_POST['password']);

    //htmlspecialchars — Convertit les caractères spéciaux en entités HTML
    //trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
    @$login = htmlspecialchars(trim($login));
    @$password = htmlspecialchars(trim($password));

    if (isset($_POST['envoi'])){
        if(isset($_POST['login']) AND isset($_POST['pass']) AND isset($_POST['confirm'])){
            @$login = htmlspecialchars($_POST['login']);//encodage 
            @$password = htmlspecialchars($_POST['password']);
            
        }
    } 

    // Verifie si le login est disponnible dans la BDD sinon changer de pseudo
    $sql = "SELECT COUNT(login) AS num FROM utilisateurs WHERE login = :login";
    $stmt = $bdd->prepare($sql);
    $stmt->bindValue(':login',$login);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['num'] > 0){
          $msg = "<br/>";
    }
    //LOGIN DEJA PRIS

    elseif(empty($_POST['login']) && empty($_POST['password'])){

    }
    elseif($_POST['password'] !=$_POST['confirm']){
        $msg = "Mot de passe incorrect<br/>";
    }//Si les mdp ne sont pas idendique (die)"mot de pass incorrect et ne crée pas d'utilisateurs dans la bdd
    else{

        $sql1 = "INSERT INTO utilisateurs(login,password)
        VALUES (:login,:password)";
        $stmt = $bdd->prepare($sql1);
        $stmt->bindParam(':login' ,$login);
        $stmt->bindParam(':password' ,$password);
  /*binParam = Identifiant. Pour une requête préparée utilisant des marqueurs nommés, ce sera le nom du paramètre sous la forme :name. Pour une requête préparée utilisant les marqueurs interrogatifs, ce sera la position indexé +1 du paramètre.*/
        //if(empty($_POST['login']) && empty($_POST['password'])){
            //die();
        //}
        if($stmt->execute()){
            $msg = "Bienvenue '$login' <br/>";
        }
        else{
            $error = "Erreur: "; $e->getMessage();
        }
        
        
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Inscription</title>
</head>
<body>
<?php
include('header.php')
?>          

<link rel="stylesheet" href="style.css">
<div class="inscription">
<form name="inscription" method="POST" action="" align="center">
 
<fieldset>
    
    <legend><h2>Inscription</h2></legend>
    <?php if(isset($msg)){
        echo $msg;
    } ?>
    Login<br>
    <input type="text" name="login" value="" autocomplete="off" required><br>
    Mot de passe<br>
    <input type="password" name="password" value="" autocomplete="off" required><br>
    Confirmation de mot de passe<br>
    <input type="password" name="confirm" value="" autocomplete="off" required><br>
    <br/><br/>
    <input type="submit" name="envoi">

  
    
</fieldset>
</form>








</body>
</html>

