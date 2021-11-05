<?php

if (!function_exists('get_provider')) {
    function get_provider($provider_id)
    {
        include('db.php');
        $result = $mysqli->query("SELECT * FROM provider WHERE id='$provider_id'");
        $provider = $result->fetch_assoc();
        return $provider;
    }
}

if (!function_exists('get_business')) {
    function get_business($business_id)
    {
        include('db.php');
        $result = $mysqli->query("SELECT * FROM business_profile WHERE id='$business_id'");
        $business = $result->fetch_assoc();
        return $business;
    }
}

if (!function_exists('get_event')) {
    function get_event($event_id)
    {
        include('db.php');
        $result = $mysqli->query("SELECT * FROM event_profile WHERE id='$event_id'");
        $event = $result->fetch_assoc();
        return $event;
    }
}

if (!function_exists('get_business_no')) {
    function get_business_no($provider_id)
    {
        include('db.php');
        $result = $mysqli->query("SELECT * FROM business_profile WHERE provider_id='$provider_id'");
        $business_no = $result->num_rows;
        return $business_no;
    }
}

if (!function_exists('get_event_no')) {
    function get_event_no($provider_id)
    {
        include('db.php');
        $result = $mysqli->query("SELECT * FROM event_profile WHERE provider_id='$provider_id'");
        $get_event_no = $result->num_rows;
        return $get_event_no;
    }
}

if (!function_exists('get_salon')) {
    function get_salon($salon_id)
    {
        include('db.php');
        $result = $mysqli->query("SELECT * FROM salon WHERE id='$salon_id'");
        $salon = $result->fetch_assoc();
        return $salon;
    }
}


if (!function_exists('get_category')) {
    function get_category($cat_id)
    {
        include('db.php');
        $result = $mysqli->query("SELECT * FROM category WHERE id='$cat_id'");
        $category = $result->fetch_assoc();
        return $category['name'];
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

if (!function_exists('store_business')) {
    function store_business($name, $address, $phone, $email, $about, $provider_id)
    {
        include('db.php');
        $sql = 'INSERT INTO business_profile (name, address, phone, email, about, provider_id)'
            . "VALUES ('$name', '$address', '$phone', '$email', '$about', '$provider_id')";
        if ($mysqli->query($sql)) {
            $_SESSION['success_message'] = 'Uspešno ste dodali biznis profil.';
            return true;
        } else {
            $_SESSION['fail_message'] = 'Problem sa dodavanjem biznis profila.';
            return false;
        }
    }
}

if (!function_exists('update_business')) {
    function update_business($business_profile_id, $name, $address, $phone, $email, $about, $provider_id)
    {
        include('db.php');
        $sql = "UPDATE business_profile SET `name`='$name', `address`='$address', `phone`='$phone', `email`='$email', `about`='$about', `provider_id`='$provider_id' WHERE id=$business_profile_id";
        if ($mysqli->query($sql)) {
            $_SESSION['success_message'] = 'Uspešno ste izmenili biznis profil.';
            return true;
        } else {
            $_SESSION['fail_message'] = 'Problem sa izmenom biznis profila.';
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
