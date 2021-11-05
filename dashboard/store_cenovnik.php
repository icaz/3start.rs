<?php
session_start();
include 'init.php';
include 'db.php';
include 'func_user.php';
include 'func_salon.php';
protect_page();


if (isset($_POST['btn']) && $_POST['btn'] == 'cenovnik') {
    $salon_id = $_POST['salon_id'];
    $cen_id = $_POST['cen_id'];
    $service_name = $_POST['service_name'];
    $service_dur = $_POST['service_dur'];
    $service_price = $_POST['service_price'];
    $service_desc = $_POST['service_desc'];

    $sql = "UPDATE cenovnik SET `salon_id`='$salon_id', `service_name`='$service_name', `service_dur`='$service_dur', `service_price`='$service_price', `service_desc`='$service_desc'
            WHERE id=$cen_id";

    if ($mysqli->query($sql)) {
        // $_SESSION['success_message'] = 'Uspešno izmenjen cenovnik';
    } else {
        $_SESSION['fail_message'] = 'Problem sa unosom cenovnika';
    }
}
header('Location: show_cenovnik.php?salon_id=' . $salon_id);
