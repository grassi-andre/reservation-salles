<?php

session_start();
include('header.php');
include('bdd.php');

$result= date($_GET['date']);

$insert = $bdd->prepare("SELECT debut FROM reservations");
$insert->execute();
$debut  = $insert->fetchAll();
//var_dump($debut);


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Infos de reservation</title>
</head>
<body id="imgfond7">
    
    <h1>
        Résérvation pour le jour : <?= $_GET['date']; ?>

    </h1>
   

<?php
$list_res = [];
foreach( $debut as $d){
    if(date("Y-m-d",strtotime($d["debut"])) == $_GET['date']){
        // var_dump(($d));
        
        $select_innerjoin = $bdd->prepare(
            "SELECT utilisateurs.login, reservations.titre, reservations.description, reservations.debut, reservations.fin 
            FROM reservations INNER JOIN utilisateurs 
            WHERE reservations.id_utilisateur = utilisateurs.id AND reservations.debut = ?");
        $select_innerjoin->execute(array($d['debut']));
        $result  = $select_innerjoin->fetch(PDO::FETCH_ASSOC);
        // var_dump($result);
        array_push($list_res, $result);
    }
    
}
foreach($list_res as $res){

    ?>
    
    <div class="card text-center border border-secondary">
  <div class="card-header">
      <?=
    $res["titre"]
    ?>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= $res["debut"]." ".$res["fin"] ?> </h5>
    <p class="card-text"><?= $res["description"]?></p>
    
  </div>
  <div class="card-footer text-muted">
  <?= $res["login"] ?>
  </div>
</div>


<?php
}


?>
    
    <footer>
    <?php
    include('footer.html')
    ?>
</footer>

</body>
</html>