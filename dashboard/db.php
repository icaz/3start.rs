<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'unisurs';
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);


// Login check
if (!function_exists('logged_in')) {
    function logged_in()
    {
        return (isset($_SESSION['logged_in'])) ? true : false;
    }
}
if (!function_exists('protect_page')) {
    function protect_page()
    {
        /////////////////// SAJT ///////////////////////////
        $sajt = $_SESSION['site_address'];
        /////////////////// SAJT ///////////////////////////

        if (logged_in() == false) {
            header('Location: ' . $sajt . 'dashboard/logout.php');
            exit();
        }
    }
}
