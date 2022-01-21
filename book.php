<?php

if(isset($_GET['date'])){
    $date = $_GET['date'];
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
    <div class="container">
        <h1 class="text-center">Book for Date:<?php echo date('d/m/Y', strtotime($date)); ?> </h1><hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">

                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="name">

                    </div>
                    <button class="btn btn-primary"type="submit" name="submit">Submit</button>
                </form>
            </div>

        </div>
    </div>
</body>
</html>