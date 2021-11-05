<?php
session_start();
include 'init.php';
include 'db.php';
include 'func_user.php';
include 'func_provider.php';
protect_page();
if (isset($_SESSION['provider_id'])) {
    $provider_id = $_SESSION['provider_id'];
} elseif (isset($_SESSION['user_id'])) {
    header('Location: ' . $sajt . 'dashboard/profile.php');
} else {
    header('Location: ' . $sajt . 'dashboard/logout.php');
}
if (isset($_POST['btn']) && $_POST['btn'] == 'business_profile') {
    $name_ok = false;
    $name = $mysqli->escape_string($_POST['name']);
    $name_value = ' value="' . $name . '"';
    $address = $mysqli->escape_string($_POST['address']);
    $address_value = ' value="' . $address . '"';
    $phone = $mysqli->escape_string($_POST['phone']);
    $phone_value = ' value="' . $phone . '"';
    $about = $mysqli->escape_string($_POST['about']);
    $about_value = ' value="' . $about . '"';
    $sql = "SELECT * FROM business_profile WHERE name='$name'";
    if ($mysqli->query($sql)) {
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION['fail_message'] = 'Već postoji business_profile sa imenom <strong> ' . $name . '.</strong>';
        } elseif ($result->num_rows == 0) {
            $sql_business_profile = 'INSERT INTO business_profile (name, address, phone, about, provider_id)'
                . "VALUES ('$name', '$address', '$phone', '$about', '$provider_id')";
            if ($mysqli->query($sql_business_profile)) {
                $business_profile_id = $mysqli->insert_id;
                if (isset($_POST['cat_id'])) {
                    $cat_id = $_POST['cat_id'];
                    foreach ($cat_id as $category_id) {
                        $sql_business_category = 'INSERT INTO business_category (business_profile_id, category_id)'
                            . "VALUES ('$business_profile_id', '$category_id')";
                        $mysqli->query($sql_business_category);
                    }
                }
            } else {
                $_SESSION['fail_message'] = 'Problem sa dodavanjem business_profile';
            }
        }
    }
}
header('Location: ' . $sajt . 'dashboard/business_profile.php');
