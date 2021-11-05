<?php
include 'init.php';
include 'func_user.php';
include 'func_salon.php';
protect_page();
$frizer_id = $_SESSION['frizer_id'];
if (isset($_POST['btn']) && $_POST['btn'] == 'salon') {
    $name_ok = false;

    $salon_name = $mysqli->escape_string($_POST['salon_name']);
    $salon_name_value = ' value="' . $salon_name . '"';

    $salon_address = $mysqli->escape_string($_POST['salon_address']);
    $salon_address_value = ' value="' . $salon_address . '"';

    $salon_phone = $mysqli->escape_string($_POST['salon_phone']);
    $salon_phone_value = ' value="' . $salon_phone . '"';

    $br_frizera = $mysqli->escape_string($_POST['br_frizera']);
    $br_frizera_value = ' value="' . $br_frizera . '"';

    $sql = "SELECT * FROM salon WHERE salon_name='$salon_name'";
    if ($mysqli->query($sql)) {
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION['fail_message'] = 'Već postoji salon sa imenom <strong> ' . $salon_name . '.</strong>';
        } elseif ($result->num_rows == 0) {
            $sql = 'INSERT INTO salon (salon_name, salon_address, salon_phone, br_frizera)'
                . "VALUES ('$salon_name', '$salon_address', '$salon_phone', '$br_frizera')";
            if ($mysqli->query($sql)) {
                $salon_id = $mysqli->insert_id;
                $sql = 'INSERT INTO frizer_salon (salon_id, frizer_id)'
                    . "VALUES ('$salon_id', '$frizer_id')";
                if ($mysqli->query($sql)) {
                    // $_SESSION['success_message'] = 'Uspešno ste dodali salon.';
                } else {
                    $_SESSION['fail_message'] = 'Problem sa dodavanjem salona';
                }
            } else {
                $_SESSION['fail_message'] = 'Problem sa dodavanjem salona';
            }
        }
    }
} else {
    $salon_name_value = ' value=""';
    $salon_address_value = ' value=""';
    $salon_phone_value = ' value=""';
    $br_frizera_value = ' value="1"';
}

if (isset($_GET['frizer_id'])) {
    $frizer_id = $_GET['frizer_id'];
    $frizer = get_frizer($frizer_id);
    $name = $frizer['name'];
    $email = $frizer['email'];
    $phone = $frizer['phone'];
    $napomena = $frizer['napomena'];

    if ($email != $_SESSION['email']) {
        $_SESSION['fail_message'] = "Problem sa logovanjem frizera...<br>Logujte se ponovo.";
        header('Location: logout.php');
    }

    $sql = "SELECT * FROM frizer_salon WHERE frizer_id='$frizer_id'";
    if ($mysqli->query($sql)) {
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $br_salona = $result->num_rows;
        } elseif ($result->num_rows == 0) {
            $br_salona = 0;
        }
    } else {
        $br_salona = 0;
    }
} elseif (isset($_SESSION['frizer_id'])) {
    $frizer_id = $_SESSION['frizer_id'];
    $frizer = get_frizer($frizer_id);
    $name = $frizer['name'];
    $email = $frizer['email'];
    $phone = $frizer['phone'];
    $napomena = $frizer['napomena'];
    $sql = "SELECT * FROM frizer_salon WHERE frizer_id='$frizer_id'";
    if ($mysqli->query($sql)) {
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $br_salona = $result->num_rows;
        } elseif ($result->num_rows == 0) {
            $br_salona = 0;
        }
    } else {
        $br_salona = 0;
    }
}



include 'head.php';
?>

<body class="hold-transition sidebar-mini">

    <?php
    $sql = "SELECT * FROM frizer_salon WHERE frizer_id='$frizer_id'";
    if ($mysqli->query($sql)) {
        $result_salon = $mysqli->query($sql);
        while ($frizer_salon = $result_salon->fetch_assoc()) {
            $salon_id = $frizer_salon['salon_id'];
            $salon = get_salon($salon_id);
            $salon_name = $salon['salon_name'];
            include 'modal_obrisi_salon.php';
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
                    <a href="/../index.php" class="btn btn-sm btn-outline-light">Nazad na <strong> frizeri.u.nisu.rs</strong></a>
            </ul>

            <ul class="navbar-nav ml-auto">
                <a href="logout.php" class="btn btn-sm btn-outline-light">log<strong>OUT</strong></a>
            </ul>

        </nav><!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar  sidebar-dark-secondary elevation-4">
            <!-- Brand Logo -->
            <a href="/../index.php" class="brand-link text-center">
                <strong>frizeri</strong>
            </a>
            <!-- Sidebar -->
            <div class="sidebar sidebar-dark-primary">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="img/avatar.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="provider_profile.php?frizer_id=<?php echo $frizer_id; ?>" class="d-block active"><?php echo $name; ?></a>
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
                                <p>Salon <span class="right badge badge-danger"><?php echo $br_salona; ?></span></p>
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
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>Radnici</p>
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
                            <h1>Frizer -
                                <?php
                                echo $name;
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

                            <!-- Profile Image -->

                            <!-- Widget: user widget style 1 -->
                            <?php
                            include 'provider_profile_card.php';
                            ?>
                            <!-- /.widget-user -->

                        </div>

                        <div class="col-md-4">
                            <?php
                            if ($br_salona == 0) {
                                include 'no_salon_msg.php';
                                include 'add_salon_card.php';
                            } elseif ($br_salona > 0) {
                                $sql = "SELECT * FROM frizer_salon WHERE frizer_id='$frizer_id'";
                                if ($mysqli->query($sql)) {
                                    $result_salon = $mysqli->query($sql);
                                    if ($result->num_rows > 0) {
                                        $br_salona = $result->num_rows;
                                        $counter = 1;
                                        while ($frizer_salon = $result_salon->fetch_assoc()) {
                                            $salon_id = $frizer_salon['salon_id'];
                                            $salon = get_salon($salon_id);
                                            $salon_name = $salon['salon_name'];
                                            $salon_address = $salon['salon_address'];
                                            $salon_phone = $salon['salon_phone'];
                                            $br_frizera = $salon['br_frizera'];
                                            if ($counter > 1) {
                                                include 'salon_card_colapsed.php';
                                            } elseif ($counter == 1) {
                                                include 'salon_card.php';
                                            }
                                            $counter++;
                                        }
                                    }
                                }
                            }
                            include 'add_salon_card_colapsed.php';
                            ?>

                        </div>
                        <div class="col-md-4">
                            <?php
                            if ($br_salona == 0) {
                            } elseif ($br_salona > 0) {
                                $sql = "SELECT * FROM frizer_salon WHERE frizer_id='$frizer_id'";
                                if ($mysqli->query($sql)) {
                                    $result_salon = $mysqli->query($sql);
                                    if ($result->num_rows > 0) {
                                        $br_salona = $result->num_rows;
                                        $counter = 1;
                                        while ($frizer_salon = $result_salon->fetch_assoc()) {
                                            $salon_id = $frizer_salon['salon_id'];
                                            $salon = get_salon($salon_id);
                                            $salon_name = $salon['salon_name'];
                                            $sql_cenovnik = "SELECT * FROM cenovnik WHERE salon_id='$salon_id'";
                                            $result_cenovnik = $mysqli->query($sql_cenovnik);
                                            if ($result_cenovnik->num_rows == 0) {
                                                include 'no_salon_cen_msg.php';
                                                include 'add_cen_card.php';
                                            } elseif ($result_cenovnik->num_rows > 0) {
                                                if ($counter > 1) {
                                                    include 'cenovnik_card_colapsed.php';
                                                } elseif ($counter == 1) {
                                                    include 'cenovnik_card.php';
                                                }
                                            }
                                            $counter++;
                                        }
                                    }
                                }
                            }

                            ?>

                            <!-- /.card /////////////////////////////////////////////////////////////////////////////////// -->

                        </div>
                    </div>


                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            include 'r_vreme_card.php';
                            ?>
                        </div>
                    </div>


                </div>





        </div><!-- /.container-fluid -->
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