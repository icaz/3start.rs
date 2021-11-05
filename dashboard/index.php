<?php
session_start();
include 'init.php';
include 'db.php';

if (logged_in()) {
    $sajt = $_SESSION['site_address'];

    if (isset($_SESSION['user_id'])) {
        header('Location: ' . $sajt . 'dashboard/profile.php');
    } elseif (isset($_SESSION['provider_id'])) {
        header('Location: ' . $sajt . 'dashboard/provider_profile.php');
    }
} else {
    header('Location: ' . $sajt . 'dashboard/logout.php');
}
