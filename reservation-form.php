<?php

if(isset($_GET['date'])){
    $date = $_GET['date'];
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_post['email'];
    $mysqli = new mysqli('localhost', 'root', 'root', 'reservationsalles');
    $stmt = $mysqli->prepare("INSERT INTO bookings (name, email, date) VALUE(?,?,?) ");
    $stmt->bind_param('sss', $name, $email, $date);
    $stmt->execute();
    $msg = "<div class='alert alert-success'>Booking Successfull</div>";
    $stmt->close();
    $mysqli->close();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <div class="form-group">
                        <label for="">Titre</label>
                        <input type="text" class="form-control" name="Titre">

                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="Description">

                    </div>
                    <div class="form-group">
                        <label for="">Debut</label>
                        <input type="text" class="form-control" name="Debut">

                    </div>
                    <div class="form-group">
                        <label for="">Fin</label>
                        <input type="email" class="form-control" name="Fin">

                    </div>
                    <button class="btn btn-primary"type="submit" name="submit">Envoyer</button>
                </form>
            </div>

        </div>
    </div>
</body>
</html>