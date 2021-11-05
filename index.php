<?php
session_start();
include 'dashboard/init.php';
include 'dashboard/db.php';
include 'dashboard/func_user.php';
include 'dashboard/func_provider.php';

if (logged_in()) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $mysqli->escape_string($_SESSION['user_id']);
        $user = get_user($user_id);
        $user_name = $user['name'];
        $log_button = '
        <a href="' . $sajt . 'dashboard/profile.php" style="font-size: 1em;" class="btn btn-xs btn-success pb-0 pt-0 mb-0 mt-0">
            <i class="fas fa-user"></i> ' . $user_name . '
        </a>';
    } elseif (isset($_SESSION['provider_id'])) {
        $provider_id = $mysqli->escape_string($_SESSION['provider_id']);
        $provider = get_provider($provider_id);
        $provider_name = $provider['name'];
        $log_button = '
        <a href="' . $sajt . 'dashboard/provider_profile.php" style="font-size: 1em;" class="btn btn-xs btn-success pb-0 pt-0 mb-0 mt-0">
            <i class="fas fa-user"></i> ' . $provider_name . '
        </a>';
    }
} else {
    $log_button = '
        <a href="' . $sajt . 'dashboard/login.php" style="font-size: 1em;" class="btn btn-xs btn-success pb-0 pt-0 mb-0 mt-0">
            <i class="fas fa-user"></i> logIN
        </a>';
}
include "head.php";
?>
provider_id

<body>
    <header id="header" id="home">

        <?php include "1line.php"; ?>

        <?php include "menu.php"; ?>

    </header><!-- #header -->

    <!-- start banner Area -->

    <?php include "banner.php"; ?>

    <!-- End banner Area -->

    <!-- Start feature Area -->

    <?php include "feature.php"; ?>

    <!-- End feature Area -->

    <!-- start footer Area -->

    <?php include "footer.php"; ?>

    <!-- End footer Area -->

    <?php include "scripts.php"; ?>

</body>

</html>