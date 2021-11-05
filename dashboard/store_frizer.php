<?php
session_start();
include 'init.php';
include 'db.php';
include 'func_user.php';
include 'func_salon.php';
protect_page();
if (isset($_GET['frizer_id'])) {
    if ($_GET['frizer_id'] != $_SESSION['frizer_id']) {
        $sajt = $_SESSION['site_address'];
        header('Location: ' . $sajt . 'dashboard/logout.php');
        exit();
    } else {
        $frizer_id = $_GET['frizer_id'];
        if (isset($_POST['btn']) && $_POST['btn'] == 'frizer') {
            $name_ok = false;
            $name = $mysqli->escape_string($_POST['name']);
            $phone = $mysqli->escape_string($_POST['phone']);

            $sql = "UPDATE frizer SET `name`='$name', `phone`='$phone' WHERE id=$frizer_id";
            if ($mysqli->query($sql)) {
                $_SESSION['success_message'] = 'Uspešno ste izmenili frizera.';
                header('Location: provider_profile.php');
            }
        }
    }
} else {
    header('Location: provider_profile.php');
}
header('Location: provider_profile.php');
