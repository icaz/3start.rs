<?php

if (!function_exists('get_salon')) {
    function get_salon($salon_id)
    {
        include('db.php');
        $result = $mysqli->query("SELECT * FROM salon WHERE id='$salon_id'");
        $salon = $result->fetch_assoc();
        return $salon;
    }
}

if (!function_exists('store_salon')) {
    function store_salon($salon_name, $salon_address, $salon_phone, $frizer_id)
    {
        include('db.php');
        $sql = 'INSERT INTO salon (salon_name, salon_address, salon_phone, admin_id)'
            . "VALUES ('$salon_name', '$salon_address', '$salon_phone', '$frizer_id')";
        if ($mysqli->query($sql)) {
            $_SESSION['success_message'] = 'Uspešno ste dodali salon.';
            return true;
        } else {
            $_SESSION['fail_message'] = 'Problem sa dodavanjem salona';
            return false;
        }
    }
}

if (!function_exists('update_salon')) {
    function update_salon($salon_id, $salon_name, $salon_address, $salon_phone, $frizer_id)
    {
        include('db.php');
        $sql = "UPDATE salon SET `salon_name`='$salon_name', `salon_address`='$salon_address', `salon_phone`='$salon_phone', `admin_id`='$frizer_id' WHERE id=$salon_id";
        if ($mysqli->query($sql)) {
            $_SESSION['success_message'] = 'Uspešno ste izmenili salon.';
            return true;
        } else {
            $_SESSION['fail_message'] = 'Problem sa izmenom salona';
            return false;
        }
    }
}

if (!function_exists('get_salon_radno_vreme')) {
    function get_salon_radno_vreme($salon_id)
    {
        include('db.php');
        $result = $mysqli->query("SELECT * FROM radno_vreme WHERE salon_id='$salon_id'");
        $salon_radno_vreme = $result->fetch_assoc();
        return $salon_radno_vreme;
    }
}

if (!function_exists('check_salon_radno_vreme')) {
    function check_salon_radno_vreme($salon_id)
    {
        include('db.php');
        $sql = "SELECT * FROM radno_vreme WHERE salon_id='$salon_id'";
        $result = $mysqli->query($sql);
        if ($result->num_rows == 0) {
            $rv_set = '  &nbsp; <span class="badge badge-danger pulseAlert-css">notSET</span>';
        } else {
            $rv_set = '';
        }
        return $rv_set;
    }
}


if (!function_exists('get_salon_worker')) {
    function get_salon_worker($salon_id)
    {
        include('db.php');
        $result = $mysqli->query("SELECT * FROM frizer_salon WHERE salon_id='$salon_id'");
        $salon_worker = $result->fetch_assoc();
        return $salon_worker;
    }
}

if (!function_exists('get_frizer_salon')) {
    function get_frizer_salon($frizer_id)
    {
        include('db.php');
        $result = $mysqli->query("SELECT * FROM frizer_salon WHERE frizer_id='$frizer_id'");
        $frizer_salon = $result->fetch_assoc();
        return $frizer_salon;
    }
}
