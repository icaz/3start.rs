<?php
session_start();
include 'init.php';
include 'db.php';
include 'func_user.php';
include 'func_provider.php';
protect_page();
if (isset($_SESSION['provider_id'])) {
    $provider_id = $_SESSION['provider_id'];
} elseif (isset($_SESSION['user_id'])) {
    header('Location: ' . $sajt . 'dashboard/profile.php');
} else {
    header('Location: ' . $sajt . 'dashboard/logout.php');
}

if (isset($_SESSION['provider_id'])) {
    $provider_id = $_SESSION['provider_id'];
    $provider = get_provider($provider_id);
    $name = $provider['name'];
    $email = $provider['email'];
    $phone = $provider['phone'];
    $about = $provider['about'];
    $business_no = get_business_no($provider_id);
} elseif (!isset($_SESSION['provider_id'])) {
    header('Location: ' . $sajt . 'dashboard/logout.php');
}
if (isset($_GET['dan'])) {
    $day = $_GET['dan'];
} else {
    $day = date("Y-m-d");
}

// $danas1 = date("Y-m-d");
$day = "2021-11-04";
$today = date_create($day);
//$date = date_create($day);

$danas = strftime("%A, %d. %B %Y.", $today);
$juce1 = date("Y-m-d", strtotime("-1 day"));
$sutra1 = date("Y-m-d", strtotime("+1 day"));
$juce = strftime("%A, %d. %B %Y.", strtotime($juce1));
$sutra = strftime("%A, %d. %B %Y.", strtotime($sutra1));

// $date = date("Y-m-d");

// date_add($date, date_interval_create_from_date_string("+1 days"));
// $date_plus_1 = date_format($date, "Y-m-d");
// date_add($date, date_interval_create_from_date_string("+2 days"));
// $date_plus_2 = date_format($date, "Y-m-d");
// date_add($date, date_interval_create_from_date_string("+3 days"));
// $date_plus_3 = date_format($date, "Y-m-d");
// date_add($date, date_interval_create_from_date_string("+4 days"));
// $date_plus_4 = date_format($date, "Y-m-d");



$test_day = ucwords($today);

include 'head.php';
?>

<body class="hold-transition sidebar-mini">
    <?php
    $sql = "SELECT * FROM business_profile WHERE provider_id='$provider_id'";
    if ($mysqli->query($sql)) {
        $result_business = $mysqli->query($sql);
        while ($business_place = $result_business->fetch_assoc()) {
            $business_id = $business_place['id'];
            $business = get_business($business_id);
            $business_name = $business['name'];
            //include 'modal_obrisi_salon.php';
        }
    }
    ?>
    <div class="wrapper">
        <!-- Navbar -->

        <?php
        include 'nav_aside.php';
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-gray">
            <!-- Main content -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>
                                <?php
                                echo $name . " - Jelena  -  " . $test_day;
                                ?>
                            </h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Widget: user widget style 1 -->
                            <?php
                            $date_for_card = 0;
                            include 'calendar_danas_card.php';
                            ?>
                            <!-- /.widget-user -->
                        </div>

                        <div class="col-md-4">
                            <!-- Widget: user widget style 1 -->
                            <?php
                            include 'calendar_p_2_card.php';
                            ?>
                            <!-- /.widget-user -->
                        </div>

                        <div class="col-md-4">
                            <!-- Widget: user widget style 1 -->
                            <?php
                            include 'kalendar.php';
                            include 'kalendar_xs2.php';

                            ?>
                            <!-- /.widget-user -->
                        </div>

                    </div> <!-- /.row -->


                </div>
            </section>
        </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="admin/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="admin/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="admin/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="admin/plugins/moment/moment.min.js"></script>
    <script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="admin/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="admin/dist/js/demo.js"></script>
    <script>
        $('.clickable-tr').on('click', function() {
            var myLink = $(this).attr('href');
            window.location.href = myLink;
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $("#salert").fadeTo(1000, 500).slideUp(500, function() {
                    $("#salert").slideUp(200);
                });
            }, 1000);
        });
        $(document).ready(function() {
            setTimeout(function() {
                $("#walert").fadeTo(5000, 500).slideUp(500, function() {
                    $("#walert").slideUp(200);
                });
            }, 1200);
        });
        $(document).ready(function() {
            setTimeout(function() {
                $("#falert").fadeTo(1000, 500).slideUp(500, function() {
                    $("#falert").slideUp(200);
                });
            }, 1400);
        });
    </script>
</body>

</html>