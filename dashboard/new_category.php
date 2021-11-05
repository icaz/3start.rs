<?php
session_start();
include 'init.php';
include 'db.php';
protect_page();
if (isset($_POST['provider_id'])) {
    if ($_POST['provider_id'] != $_SESSION['provider_id']) {
        $sajt = $_SESSION['site_address'];
        header('Location: ' . $sajt . 'dashboard/logout.php');
        exit();
    } else {
        $provider_id = $_POST['provider_id'];
        if (isset($_POST['btn']) && $_POST['btn'] == 'store_cat') {
            $name = $mysqli->escape_string($_POST['name']);
            $nparent_id = $mysqli->escape_string($_POST['nparent_id']);
            $id = $mysqli->escape_string($_POST['id']);

            $sql = "INSERT INTO category (`name`, `parent_id`) VALUES ('$name', '$nparent_id')";
            if ($mysqli->query($sql)) {
                $_SESSION['success_message'] = 'Uspešno ste izmenili frizera.';
                header('Location: category.php');
            }
        }
    }
} else {
    header('Location: category.php');
}
header('Location: category.php');

//INSERT INTO Customers (CustomerName, City, Country)
//VALUES ('Cardinal', 'Stavanger', 'Norway');