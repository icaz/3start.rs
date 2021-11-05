<?php
date_default_timezone_set('Europe/Belgrade');
setlocale(LC_TIME, array('sr_CS.UTF-8', 'sr.UTF-8'));
setlocale(LC_ALL, 'sr_RS@latin');
$danas1 = date("Y-m-d");
$danas = strftime("%A, %d. %B %Y.");

$sajt = "http://start.rs/";

/////////////////// SAJT ///////////////////////////
if (!isset($_SESSION['site_address'])) {
    $_SESSION['site_address'] = $sajt;
}
/////////////////// SAJT ///////////////////////////

$hours = [
    '07:00', '08:00', '09:00',  '10:00', '11:00', '12:00', '13:00',
    '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00'
];
// default radno vreme
