<?php

session_start();
include('header.php');
include('bdd.php');

$result= date($_GET['date']);

$insert = $bdd->prepare("SELECT debut FROM reservations");
$insert->execute();
$debut  = $insert->fetchAll();
foreach( $debut as $d){
    if(date("Y-m-d",strtotime($d["debut"])) == $_GET['date']){
        
        
        
    }
    
}








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


        
    
        

</body>
</html>