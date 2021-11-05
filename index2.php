<?php
session_start();
include 'dashboard/init.php';
include 'dashboard/db.php';
include 'dashboard/func_user.php';



if (logged_in()) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $mysqli->escape_string($_SESSION['user_id']);
        $user = get_user($user_id);
        $user_name = $user['name'];
        $log_button = '
        <a href="' . $sajt . 'dashboard/profile.php">
            <h4 class="tm-login-name"><i class="fas fa-user tm-login-logo fa-1x "></i>' . $user_name . '</h4>
        </a>';
    } elseif (isset($_SESSION['frizer_id'])) {
        $frizer_id = $mysqli->escape_string($_SESSION['frizer_id']);
        $frizer = get_frizer($frizer_id);
        $frizer_name = $frizer['name'];
        $log_button = '
        <a href="' . $sajt . 'dashboard/provider_profile.php">
            <h4 class="tm-login-name"><i class="fas fa-user tm-login-logo fa-1x "></i>' . $frizer_name . '</h4>
        </a>';
    }
} else {
    $log_button = '
        <a href="' . $sajt . 'dashboard/login.php">
            <h4 class="tm-login-name"><i class="fas fa-user tm-login-logo fa-1x "></i>logIN</h4>
        </a>';
}
include "head.php";

?>

<body>
    <header id="header" id="home">

        <?php include "1line.php"; ?>

        <?php include "menu.php"; ?>

    </header><!-- #header -->

    <!-- start banner Area -->

    <!-- End banner Area -->

    <!-- Start feature Area -->

    <!-- End feature Area -->

    <!-- Start popular-course Area -->

    <!-- End popular-course Area -->


    <!-- Start search-course Area -->

    <!-- End search-course Area -->


    <!-- Start upcoming-event Area -->

    <!-- End upcoming-event Area -->

    <!-- Start review Area -->

    <!-- End review Area -->

    <!-- Start cta-one Area -->
    <!-- End cta-one Area -->

    <!-- Start blog Area -->

    <!-- End blog Area -->


    <!-- Start cta-two Area -->

    <!-- End cta-two Area -->

    <!-- start footer Area -->

    <!-- End footer Area -->


    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="js/easing.min.js"></script>
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.tabs.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>
</body>

</html>