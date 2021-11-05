<?php
session_start();
// setcookie("email", "", time()-3600);
if (isset($_SESSION['fail_message']) && $_SESSION['fail_message'] != '') {
    $forward_fail = $_SESSION['fail_message'];
}
include 'init.php';
/////////////////// SAJT ///////////////////////////
$sajt = $_SESSION['site_address'];
/////////////////// SAJT ///////////////////////////

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <?php include 'css/css.html'; ?>
</head>

<body>
    <div class="form">
        <?php
        //setcookie('email', $_POST['email'], 1);
        //setcookie('password', password_hash($_POST['password'], PASSWORD_BCRYPT), 1);
        //var_dump($_SESSION);
        session_unset();
        session_destroy();
        echo 'Session was destroyed';

        // setcookie('kalendar', 'frizeri', time() - 3600, "/");
        // setcookie('type', '', time() - 3600, "/");
        // setcookie('id', '', time() - 3600, "/");

        session_start();
        if (isset($forward_fail)) {
            $_SESSION['fail_message'] = $forward_fail;
        }
        echo $sajt;
        header('Location: ' . $sajt . 'dashboard/login.php');
        ?>
    </div>
</body>

</html>