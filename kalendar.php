<?php
$output_now = '';
// Now
$boja = 'tm-cal-col';
$date = date(strtotime("-0 months"));
$day = date('d', $date);
$month = date('m', $date);
$year = date('Y', $date);
//Here we generate the first day of the month 
$first_day = mktime(0, 0, 0, $month, 1, $year);
//This gets us the month name 
//$title = date('F', $first_day) ;
switch ($month) {
    case "01":
        $mesec = 'Januar';
        break;
    case "02":
        $mesec = 'Februar';
        break;
    case "03":
        $mesec = 'Mart';
        break;
    case "04":
        $mesec = 'April';
        break;
    case "05":
        $mesec = 'Maj';
        break;
    case "06":
        $mesec = 'Juni';
        break;
    case "07":
        $mesec = 'Juli';
        break;
    case "08":
        $mesec = 'Avgust';
        break;
    case "09":
        $mesec = 'Septembar';
        break;
    case "10":
        $mesec = 'Oktobar';
        break;
    case "11":
        $mesec = 'Novembar';
        break;
    case "12":
        $mesec = 'Decembar';
        break;
}
//Here we find out what day of the week the first day of the month falls on 
$day_of_week = date('D', $first_day);
//Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero
switch ($day_of_week) {
    case "Mon":
        $blank = 0;
        break;
    case "Tue":
        $blank = 1;
        break;
    case "Wed":
        $blank = 2;
        break;
    case "Thu":
        $blank = 3;
        break;
    case "Fri":
        $blank = 4;
        break;
    case "Sat":
        $blank = 5;
        break;
    case "Sun":
        $blank = 6;
        break;
}
//We then determine how many days are in the current month
$days_in_month = cal_days_in_month(0, $month, $year);
//Here we start building the table heads 

$output_now .= '
<div class="tm-cal-header">
    <h4 class="tm-cal-datum">
        ' . $mesec . '  ' . $year . '
    </h4>
</div>
<div class="tm-cal-1st-body">
    <div class="tm-cal-1st-row">    
        <div class="tm-cal-1st-col">Pon</div>
        <div class="tm-cal-1st-col">Uto</div>
        <div class="tm-cal-1st-col">Sre</div>
        <div class="tm-cal-1st-col">Čet</div>
        <div class="tm-cal-1st-col">Pet</div>
        <div class="tm-cal-1st-col">Sub</div>
        <div class="tm-cal-1st-col">Ned</div>
    </div>

    
    <div class="tm-cal-1st-row">';
$day_count = 1;
while ($blank > 0) {
    $output_now .= '<div href="#" class="tm-cal-col2"></div>';
    $blank = $blank - 1;
    $day_count++;
}
//count up the days, untill we've done all of them in the month
$day_num = 1;
while ($day_num <= $days_in_month) {
    if ($day_num < 10) {
        $day_num0 = '0' . $day_num;
    } else {
        $day_num0 = $day_num;
    }
    if ($day_num0 == $day) {
        $boja = 'tm-cal-col-today';
    } else {
        $boja = 'tm-cal-col';
    }
    $output_now .= '<a class="' . $boja . '" href="dan.php?dan=' . $year . '-' . $month . '-' . $day_num0 . '">' . $day_num0 . '</a>';
    $day_num++;
    $day_count++;
    //Make sure we start a new row every week
    if ($day_count > 7) {
        $output_now .= '</div><div class="tm-cal-1st-row">';
        $day_count = 1;
    }
}
//Finaly we finish out the table with some blank details if needed
while ($day_count > 1 && $day_count <= 7) {
    $output_now .= '<div class="tm-cal-col2"></div>';
    $day_count++;
}

$output_now .= '
    </div>
</div>
';

echo $output_now;
