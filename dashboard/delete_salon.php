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

$sql_del_salon = "DELETE FROM salon WHERE id='$salon_id'";
if ($mysqli->query($sql_del_salon)) {
    // $_SESSION['success_message'] = "Uspešno ste obrisali salon $salon_name";
    $sql_del_radno_vreme = "DELETE FROM radno_vreme WHERE salon_id='$salon_id'";
    if ($mysqli->query($sql_del_radno_vreme)) {
        // $_SESSION['success_message'] .= "<br>Uspešno ste obrisali radno vreme $salon_name";
        $sql_del_cenovnik = "DELETE FROM cenovnik WHERE salon_id='$salon_id'";
        if ($mysqli->query($sql_del_cenovnik)) {
            // $_SESSION['success_message'] .= "<br>Uspešno ste obrisali cenovnik $salon_name";
            $sql_del_frizer_salon = "DELETE FROM frizer_salon WHERE salon_id='$salon_id'";
            if ($mysqli->query($sql_del_frizer_salon)) {
                // $_SESSION['success_message'] .= "<br>Uspešno ste obrisali radno vreme $salon_name";
                $sql_del_user_salon = "DELETE FROM user_salon WHERE salon_id='$salon_id'";
                if ($mysqli->query($sql_del_user_salon)) {
                    // $_SESSION['success_message'] .= "<br>Uspešno ste obrisali user salon $salon_name";

                    header('Location: provider_profile.php');
                }

                header('Location: provider_profile.php');
            }

            header('Location: provider_profile.php');
        }

        header('Location: provider_profile.php');
    }
    header('Location: provider_profile.php');
} else {
    $_SESSION['fail_message'] = "Problem sa brisanjem salona.";
    header('Location: provider_profile.php');
}
