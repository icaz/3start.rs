<?php
date_default_timezone_set('Europe/Belgrade');
setlocale(LC_TIME, array('sr_CS.UTF-8', 'sr.UTF-8'));
setlocale(LC_ALL, 'sr_RS@latin');

$danas1 = date("Y-m-d");
$danas = strftime("%A, %d. %B %Y.");
$ip = '0.0.0.0';
$ip = $_SERVER['REMOTE_ADDR'];
$clientDetails = json_decode(file_get_contents("http://ipinfo.io/$ip/json"));

// Use JSON encoded string and converts
// it into a PHP variable
$ipdat = @json_decode(file_get_contents(
    "http://www.geoplugin.net/json.gp?ip=" . $ip
));
echo 'Country Name: ' . $ipdat->geoplugin_countryName . "\n";
echo 'City Name: ' . $ipdat->geoplugin_city . "\n";
echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "\n";
echo 'Latitude: ' . $ipdat->geoplugin_latitude . "\n";
echo 'Longitude: ' . $ipdat->geoplugin_longitude . "\n";
echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n";
echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n";
echo 'Timezone: ' . $ipdat->geoplugin_timezone;
