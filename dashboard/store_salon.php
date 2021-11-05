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
        if (isset($_POST['btn']) && $_POST['btn'] == 'salon') {
            $name_ok = false;
            $salon_name = $mysqli->escape_string($_POST['salon_name']);
            $salon_name_value = ' value="' . $salon_name . '"';
            $salon_address = $mysqli->escape_string($_POST['salon_address']);
            $salon_address_value = ' value="' . $salon_address . '"';
            $salon_phone = $mysqli->escape_string($_POST['salon_phone']);
            $salon_phone_value = ' value="' . $salon_phone . '"';
            $br_frizera = $mysqli->escape_string($_POST['br_frizera']);
            $br_frizera_value = ' value="' . $br_frizera . '"';
            $sql = "SELECT * FROM salon WHERE salon_name='$salon_name'";
            if ($mysqli->query($sql)) {
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                    $_SESSION['fail_message'] = 'Već postoji salon sa imenom <strong> ' . $salon_name . '.</strong>';
                } elseif ($result->num_rows == 0) {
                    $sql = 'INSERT INTO salon (salon_name, salon_address, salon_phone, br_frizera)'
                        . "VALUES ('$salon_name', '$salon_address', '$salon_phone', '$br_frizera')";
                    if ($mysqli->query($sql)) {
                        $salon_id = $mysqli->insert_id;
                        $sql = 'INSERT INTO frizer_salon (salon_id, frizer_id)'
                            . "VALUES ('$salon_id', '$frizer_id')";
                        if ($mysqli->query($sql)) {
                            // $_SESSION['success_message'] = 'Uspešno ste dodali salon.';
                        } else {
                            $_SESSION['fail_message'] = 'Problem sa dodavanjem salona';
                        }
                    } else {
                        $_SESSION['fail_message'] = 'Problem sa dodavanjem salona';
                    }
                }
            }
        }
    }
} else {
    header('Location: provider_profile.php');
}
header('Location: provider_profile.php');
