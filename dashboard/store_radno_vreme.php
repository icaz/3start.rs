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

if (isset($_POST['btn']) && $_POST['btn'] == "radno_vreme") {
    foreach ($hours as $hour) {
        if (isset($_POST['pon'])) {
            $myJSONpon = json_encode($_POST['pon']);
        } elseif (!isset($_POST['pon'])) {
            $myJSONpon = "";
        }
        if (isset($_POST['uto'])) {
            $myJSONuto = json_encode($_POST['uto']);
        } elseif (!isset($_POST['uto'])) {
            $myJSONuto = "";
        }
        if (isset($_POST['sre'])) {
            $myJSONsre = json_encode($_POST['sre']);
        } elseif (!isset($_POST['sre'])) {
            $myJSONsre = "";
        }
        if (isset($_POST['cet'])) {
            $myJSONcet = json_encode($_POST['cet']);
        } elseif (!isset($_POST['cet'])) {
            $myJSONcet = "";
        }
        if (isset($_POST['pet'])) {
            $myJSONpet = json_encode($_POST['pet']);
        } elseif (!isset($_POST['pet'])) {
            $myJSONpet = "";
        }
        if (isset($_POST['sub'])) {
            $myJSONsub = json_encode($_POST['sub']);
        } elseif (!isset($_POST['sub'])) {
            $myJSONsub = "";
        }
        if (isset($_POST['ned'])) {
            $myJSONned = json_encode($_POST['ned']);
        } elseif (!isset($_POST['ned'])) {
            $myJSONned = "";
        }
    }
    $sql_del_old = "DELETE FROM radno_vreme WHERE salon_id='$salon_id'";
    $mysqli->query($sql_del_old);
    $sql = "INSERT INTO radno_vreme (salon_id, pon, uto, sre, cet, pet, sub, ned)"
        . "VALUES ('$salon_id', '$myJSONpon', '$myJSONuto', '$myJSONsre', '$myJSONcet', '$myJSONpet', '$myJSONsub', '$myJSONned')";
    if ($mysqli->query($sql)) {
        // $_SESSION['success_message'] = "Uspešno ste dodali radno vreme salona.";
        header('Location: provider_profile.php');
    } else {
        $_SESSION['fail_message'] = "Problem sa dodavanjem salona.";
    }
} else {
    header('Location: provider_profile.php');
}
