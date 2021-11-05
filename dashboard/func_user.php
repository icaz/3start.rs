<?php

if (!function_exists('get_user')) {
    function get_user($user_id)
    {
        include 'db.php';
        $result = $mysqli->query("SELECT * FROM user WHERE id='$user_id'");
        $user = $result->fetch_assoc();
        return $user;
    }
}

if (!function_exists('get_user_by_mail')) {
    function get_user_by_mail($email)
    {
        include 'db.php';
        $result = $mysqli->query("SELECT * FROM user WHERE email='$email'");
        $user = $result->fetch_assoc();

        return $user;
    }
}

if (!function_exists('get_double_user')) {
    function get_double_user($name)
    {
        include 'db.php';
        $result = $mysqli->query("SELECT * FROM user WHERE name='$name'");
        $user = $result->fetch_assoc();

        return $user;
    }
}


if (!function_exists('check_user_name')) {
    function check_user_name($name)
    {
        include 'db.php';
        $result = $mysqli->query("SELECT * FROM user WHERE name='$name'");
        $same_name = $result->num_rows;
        if ($same_name > 1) {
            return true;
        } else {
            return false;
        }
    }
}


if (!function_exists('get_frizer')) {
    function get_frizer($id)
    {
        include 'db.php';
        $result = $mysqli->query("SELECT * FROM frizer WHERE id='$id'");
        $frizer = $result->fetch_assoc();

        return $frizer;
    }
}

if (!function_exists('get_provider_by_mail')) {
    function get_provider_by_mail($email)
    {
        include 'db.php';
        $result = $mysqli->query("SELECT * FROM provider WHERE email='$email'");
        $provider = $result->fetch_assoc();

        return $provider;
    }
}


if (!function_exists('get_admin_salon')) {
    function get_admin_salon($id)
    {
        include 'db.php';
        $result = $mysqli->query("SELECT * FROM salon_admin WHERE frizer_id='$id'");
        $salons = $result->fetch_assoc();

        return $salons;
    }
}


if (!function_exists('get_salon_admin')) {
    function get_salon_admin($id)
    {
        include 'db.php';
        $result = $mysqli->query("SELECT * FROM salon_admin WHERE salon_id='$id'");
        $frizers = $result->fetch_assoc();

        return $frizers;
    }
}

if (!function_exists('get_frizer_salon')) {
    function get_frizer_salon($id)
    {
        include 'db.php';
        $result = $mysqli->query("SELECT * FROM frizer_salon WHERE frizer_id='$id'");
        $salons = $result->fetch_assoc();

        return $salons;
    }
}


if (!function_exists('get_salon_frizer')) {
    function get_salon_frizer($id)
    {
        include 'db.php';
        $result = $mysqli->query("SELECT * FROM frizer_salon WHERE salon_id='$id'");
        $frizers = $result->fetch_assoc();

        return $frizers;
    }
}
