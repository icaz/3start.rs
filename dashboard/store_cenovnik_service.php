<?php
session_start();
include 'init.php';
include 'db.php';
if (isset($_SESSION['provider_id'])) {
    $provider_id = $_SESSION['provider_id'];
} else {
    header('Location: ' . $sajt . 'dashboard/logout.php');
}

if (isset($_POST['btn']) && $_POST['btn'] == 'cenovnik') {
    $provider_id = $mysqli->escape_string($_POST['provider_id']);
    $service_name = $mysqli->escape_string($_POST['service_name']);
    $service_dur = $mysqli->escape_string($_POST['service_dur']);
    $service_price = $mysqli->escape_string($_POST['service_price']);
    $business_profile_id = $mysqli->escape_string($_POST['business_profile_id']);
    $sql_cenovnik_insert = 'INSERT INTO cenovnik_service (provider_id, business_profile_id, service_name, service_dur, service_price)'
        . "VALUES ('$provider_id', '$business_profile_id', '$service_name', '$service_dur', '$service_price')";
    if ($mysqli->query($sql_cenovnik_insert)) {
        // $_SESSION['success_message'] = 'Uspešno uneta stavka cenovnika';
    } else {
        $_SESSION['fail_message'] = 'Problem sa unosom cenovnika';
    }
}
header('Location: ' . $sajt . 'dashboard/view_services.php');
