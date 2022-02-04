<?php 

$servname = 'localhost';
$dbname = 'reservationsalles';  // log de connexion à la bdd 
$user = 'root';
$mdp ='root';

try{
    
    
    $bdd = new PDO("mysql:host=$servname;dbname=$dbname","$user","$mdp");//connexion à la bdd
    $bdd-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch(PDOException $e){

    echo 'erreur : '. $e->getMessage();
}

?>


