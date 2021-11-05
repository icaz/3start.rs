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
            $parent_id = $mysqli->escape_string($_POST['parent_id']);
            $id = $mysqli->escape_string($_POST['id']);

            $sql = "UPDATE category SET `name`='$name', `parent_id`='$parent_id' WHERE `id`='$id'";
            if ($mysqli->query($sql)) {
                $_SESSION['success_message'] = 'Uspešno ste izmenili frizera.';
                header('Location: category.php');
            }
        } elseif (isset($_POST['btn']) && $_POST['btn'] == 'delete') {
            $id = $mysqli->escape_string($_POST['id']);

            $sql = "DELETE FROM category WHERE `id`='$id'";
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

//DELETE FROM Customers WHERE CustomerName='Alfreds Futterkiste'