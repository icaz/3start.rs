<?php
session_start();
include 'init.php';
include 'db.php';
include 'func_user.php';
include 'func_salon.php';
protect_page();
$frizer_id = $_SESSION['frizer_id'];

if (isset($_GET['salon_id'])) {
    $salon_id = $_GET['salon_id'];
} else {
    header('Location: provider_profile.php');
}
$salon = get_salon($salon_id);
$salon_name = $salon['salon_name'];
$sql = "SELECT * FROM frizer_salon WHERE frizer_id='$frizer_id'";
$result = $mysqli->query($sql);
if ($result->num_rows == 0) {
    $_SESSION['fail_message'] = "Problem sa brisanjem cenovnika salona $salon_name.";
    header('Location: provider_profile.php');
}

$sql_del_cen = "DELETE FROM cenovnik WHERE salon_id='$salon_id'";
if ($mysqli->query($sql_del_cen)) {
    // $_SESSION['success_message'] = "Uspešno ste obrisali cenovnik za salon $salon_name.";
    header('Location: provider_profile.php');
} else {
    $_SESSION['fail_message'] = "Problem sa brisanjem cenovnika salona $salon_name.";
    header('Location: provider_profile.php');
}
