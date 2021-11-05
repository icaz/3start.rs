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
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block mr-1 mt-1">
                    <a href="/../index.php" class="btn btn-sm btn-outline-light">Nazad na <strong> <?php echo $sajt; ?></strong></a>
            </ul>
            <ul class="navbar-nav ml-auto">
                <a href="logout.php" class="btn btn-sm btn-outline-light">log<strong>OUT</strong></a>
            </ul>
        </nav><!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar  sidebar-dark-secondary elevation-4">
            <!-- Brand Logo -->
            <a href="/../index.php" class="brand-link text-center">
                <strong>u.nisu.rs</strong>
            </a>
            <!-- Sidebar -->
            <div class="sidebar sidebar-dark-primary">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="img/avatar.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="provider_profile.php?provider_id=<?php echo $provider_id; ?>" class="d-block active"><?php echo $name; ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="show_salon.php" class="nav-link">
                                <i class="nav-icon fas fa-store"></i>
                                <p>Biznis profil <span class="right badge badge-danger"><?php echo $business_no; ?></span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view_cal.php" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>Kalendar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view_services.php" class="nav-link">
                                <i class="nav-icon fas fa-cut"></i>
                                <p>Usluge</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="category.php" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>Kategorije</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-danger">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>E-mail lista</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="invite.php" class="nav-link text-danger">
                                <i class="nav-icon fas fa-phone"></i>
                                <p>Preporuči</p>
                            </a>
                        </li>
                    </ul>
                </nav><!-- /.sidebar-menu -->
            </div><!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-gray">
            <!-- Main content -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>
                                <?php
                                echo $name . " - Jelena";
                                ?>
                            </h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <!-- Widget: user widget style 1 -->
                            <?php
                            include 'calendar_p_1a_card.php';
                            ?>
                            <!-- /.widget-user -->
                        </div>

                        <div class="col-md-2">
                            <!-- Widget: user widget style 1 -->
                            <?php
                            include 'calendar_p_1a_card.php';
                            ?>
                            <!-- /.widget-user -->
                        </div>

                        <div class="col-md-2">
                            <!-- Widget: user widget style 1 -->
                            <?php
                            include 'calendar_p_1_card.php';
                            ?>
                            <!-- /.widget-user -->
                        </div>

                        <div class="col-md-2">
                            <!-- Widget: user widget style 1 -->
                            <?php
                            include 'calendar_p_1_card.php';
                            ?>
                            <!-- /.widget-user -->
                        </div>

                        <div class="col-md-2">
                            <!-- Widget: user widget style 1 -->
                            <?php
                            include 'calendar_p_1_card.php';
                            ?>
                            <!-- /.widget-user -->
                        </div>

                        <div class="col-md-2">
                            <!-- Widget: user widget style 1 -->
                            <?php
                            include 'calendar_p_1_card.php';
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