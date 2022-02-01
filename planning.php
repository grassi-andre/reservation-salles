<?php

function build_calendar($month, $year){

    $daysOfWeek = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');

    $firstdayofmonth = mktime(0,0,0,$month,1,$year);

    $numberDays = date('t',$firstdayofmonth);

    $dateComponents = getdate($firstdayofmonth);

    $monthName = $dateComponents['month'];

    $dayOfWeek = $dateComponents['wday'];

    $dateToday = date('Y-m-d');

    $calendar = "<table class='table table-bordered'>";
    $calendar.= "<center><h2>$monthName $year</h2>";

    $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0,0,0, $month-1,1,$year))."&year=".date('Y', mktime(0,0,0, $month-1,1,$year))."'>Last month</a>";
    //       var_dump($calendrier);
    $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>This month</a>";
    //       var_dump($calendrier);
    $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0,0,0, $month+1,1,$year))."&year=".date('Y', mktime(0,0,0, $month+1,1,$year))."'>Next month</a></center></br>";
    $calendar.="<tr>";

    

    foreach($daysOfWeek as $day){
        $calendar.="<th class='header'>$day</th>";
    }

    $calendar.= "</tr><tr>";

    if($dayOfWeek > 0){
        for($k=0;$k<$dayOfWeek;$k++){
            $calendar.="<td></td>";
        }
    }


    $currentDay = 1;

    $month = str_pad($month,2,0,STR_PAD_LEFT);
    
    while($currentDay <= $numberDays)
    {

        if($dayOfWeek == 7){
            $dayOfWeek = 0;
            $calendar.="</tr><tr>";
        }
    
        $currentDayRel = str_pad($currentDay,2,0,STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $dayname = strtolower(date('i', strtotime($date)));
        $evenNum = 0;
        $today = $date ==date('Y-m-d')? "today":"";

        // si date < ojd alors n/a 
          if($date<date('Y-m-d')){
             $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
        
         }
            // sinon date ojd == colors jaune et book 
         elseif(date('Y-m-d')==$date){
             $calendar.= "<td class='today' rel='$date'><h4>$currentDay</h4>$currentDay</h4><a href='book.php?date=".$date."' class='btn btn-success btn-xs'>Book</a>";
             $calendar.= "<td rel='$date'><h4>$currentDay</h4> <a href='reservation.php?date=".$date."' class='btn btn-success btn-xs'>Info</a>";
            //  sinon date>ojd = book
         }else{
             $calendar.= "<td rel='$date'><h4>$currentDay</h4> <a href='reservation-form.php?date=".$date."' class='btn btn-success btn-xs'>Book</a>";
             
     }
    
        $calendar.="</td>";
    
        $currentDay++;
        $dayOfWeek++;

    }

    if($dayOfWeek != 7){
        $remainingDays = 7-$dayOfWeek;
        for($i=0;$i<$remainingDays;$i++){
            $calendar.="<td></td>";
        }
    }

    $calendar.="</tr>";
    $calendar.="</table>";

    echo $calendar;

}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Planning</title>
    <style>
        table{
            table-layout: fixed;
        }

        td{
            width: 33% ;
        }

        .today{
            background: yellow;
        }
    </style>
</head>
<body>
<?php
include('header.php');
?> 
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php

                    $dateComponents = getdate();



                    if(isset($_GET["month"])){
                        $month = $_GET["month"];
                        $year = $_GET["year"];
                    }
                    else{
                        $month = $dateComponents['mon'];
                        $year = $dateComponents['year'];
                    }
                    
                    echo build_calendar($month,$year);
                    
                ?>

            </div>
        </div>
    </div>
    
</body>
</html>