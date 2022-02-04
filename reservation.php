<?php




//id sql
session_start();
include('header.php');

$serveur = "localhost";
$dbname = "reservationsalles";
$user = "root";
$pass = "root";


try{ 
    //Connexion BDD 
    $log = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
    $log->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
// Erreur
catch(PDOException $e){
    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
}

$insert = $log->query("SELECT * FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id");
$comment  = $insert->fetch();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Reservation</title>
</head>
<body>
    <?php
    ?>
    
       <p>Titre de resérvation : <?= $comment['titre'] ;?>  </p>
       <p>Description : <?= $comment['description'] ;?>  </p>
       <p>Début : <?= $comment['debut'] ;?>  </p>
       <p>Fin : <?= $comment['fin'] ;?>  </p>


        

</body>
</html>