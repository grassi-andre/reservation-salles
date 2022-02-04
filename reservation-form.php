<?php

session_start();

if(isset($_GET['date'])){
    $date = $_GET['date'];
}

if(isset($_POST['submit'])){

// inval aller voir 
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    include('bdd.php');

    if (isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['debut']) && isset($_POST['fin'])){

        $now = new DateTime();
        $hnow = $now->format('Y-m-d H:i:s');
        $debut = (new DateTime($_POST['debut']))->format("$date H:i:s");
        $fin = (new DateTime($_POST['fin']))->format("$date H:i:s");
        $debut_int = intval((new DateTime($_POST['debut']))->format('H'));
        $fin_int = intval((new DateTime($_POST['fin']))->format('H'));
        $day = intval((new DateTime($_POST['debut']))->format('W'));
        $heure = $fin_int - $debut_int;
        
        
        if ($debut_int >= 8 && $fin_int <=19) {
            
            if ($heure == 1){

                
                if ($debut >= $hnow){
                    
                    
                    // requete resa existe (rowCount )
                    // si rowcount == 0 -> existe pas 
                    $query=$bdd->prepare('SELECT debut FROM reservations WHERE debut = ?');
                    $query->execute(array($debut));
                    $result = $query->rowCount();
                        if($result == 0){
                            
                            // $req->prepare("INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES (:titre, :description, :debut, :fin, :id_utilisateur)");         
                            // $req->bindValue(':titre', $titre);         
                            // $req->bindValue(':description', $description);
                            // $req->bindValue(':debut', $debut);   
                            // $req->bindValue(':fin', $fin);    
                            // $req->bindValue(':id_utilisateur', $id_utilisateur); 
                            // $req->execute();
                            $stmt = $bdd->prepare("INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUE(?,?,?,?,?)");
                            $stmt->execute(array($titre, $description, $debut, $fin, $_SESSION['id']));
                            $msg = "<div class='alert alert-success'>Réservation reussi</div>";
                        
                        }else{
                            $msg = "<div class='alert alert-success'>Horaire deja pris</div>";
                        }
                    
                }
            }else{
                $msg = "<div class='alert alert-success'>Résérvation de 1h Minimum</div>";
            }
                
            

        }else{
            $msg = "<div class='alert alert-success'>Ouvert uniquement de 8h à 19h</div>";
        }

    }



    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>formulaire de reservation</title>
</head>
<body>
<?php
include('header.php');
?> 
    <div class="container">
        <h1 class="text-center">Réserver pour le :<?php echo date('d/m/Y', strtotime($date)); ?> </h1><hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="" method="post" autocomplete="off">
                    <?php  if(isset($msg)){
                        echo $msg;
                    } ?>

                    <div class="form-group">
                        <label for="">Titre</label>
                        <input type="text" class="form-control" name="titre">

                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description">

                    </div>
                    <div class="form-group">
                        <label for="">Debut</label>
                        <input type="time" class="form-control" name="debut">

                    </div>
                    <div class="form-group">
                        <label for="">Fin</label>
                        <input type="time" class="form-control" name="fin">

                    </div>
                    <button class="btn btn-primary"type="submit" name="submit">Envoyer</button>
                </form>
            </div>

        </div>
    </div>
</body>
</html>