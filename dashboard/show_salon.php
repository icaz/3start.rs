<?php
session_start();
include 'init.php';
include 'db.php';
include 'func_user.php';
include 'func_salon.php';
protect_page();
// if (!isset($_GET['salon_id'])) {
//     $_SESSION['fail_message'] = 'Problem za izborom Salona';
//     header('Location: provider_profile.php');
// } elseif (isset($_GET['salon_id'])) {
//     $salon_id = $_GET['salon_id'];
//     $salon = get_salon($salon_id);
//     $salon_name = $salon['salon_name'];
//     # code...
// }
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
                        <?php

                        if ($br_salona == 0) {
                            echo '<div class="col-md-6">';
                            include 'no_salon_msg.php';
                            include 'add_salon_card.php';
                            echo '</div>';
                        } elseif ($br_salona > 0) {
                            $sql = "SELECT * FROM frizer_salon WHERE frizer_id='$frizer_id'";
                            if ($mysqli->query($sql)) {
                                $result_salon = $mysqli->query($sql);
                                if ($result_salon->num_rows > 0) {
                                    $br_salona = $result_salon->num_rows;
                                    $salon_coounter = 1;
                                    while ($frizer_salon = $result_salon->fetch_assoc()) {
                                        $salon_id = $frizer_salon['salon_id'];
                                        $salon = get_salon($salon_id);
                                        $salon_name = $salon['salon_name'];
                                        $salon_address = $salon['salon_address'];
                                        $salon_phone = $salon['salon_phone'];
                                        $br_frizera = $salon['br_frizera'];
                                        if ($salon_coounter > 1) {
                                            include 'salon_card_colapsed.php';
                                        } elseif ($salon_coounter == 1) {
                                            include 'salon_card.php';
                                        }
                                        $salon_coounter++;
                                    }
                                }
                            }
                            include 'add_salon_card_colapsed.php';
                        }
                        ?>







                        <div class="col-md-8">
                            <?php
                            include 'info.php';
                            ?>

                            <div class="card card-primary card-outline bg-dark">
                                <div class="card-header">
                                    <p class="card-title">cenovnik za<b>
                                            <?php
                                            echo $salon_name;
                                            ?>
                                        </b></p>
                                    <div class="card-tools">
                                        <a href="provider_profile.php" type="button" class="btn btn-tool"><i class="fas fa-times"></i></a>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>

                                </div>
                                <div class="card-body border-top table-responsive">
                                    <?php
                                    $sql_cenovnik = "SELECT * FROM cenovnik WHERE salon_id='$salon_id'";
                                    $result_cenovnik = $mysqli->query($sql_cenovnik);
                                    if ($result_cenovnik->num_rows > 0) {
                                        echo '
                                                <table class="table table-condensed table-hover table-dark">
                                                    <thead>
                                                        <tr>
                                                            <th>Usluga</th>
                                                            <th style="width: 100px">Vreme</th>
                                                            <th style="width: 100px">Cena</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';

                                        $services = $result_cenovnik->fetch_all(MYSQLI_ASSOC);
                                        foreach ($services as $service) {

                                            echo '<tr class="clickable-tr" href="edit_cenovnik.php?salon_id=' . $salon_id . '&cen_id=' . $service["id"] . '"><td>' . $service["service_name"] . '</td>';

                                            switch ($service['service_dur']) {
                                                case 1:
                                                    echo "<td>30 min</td>";
                                                    break;
                                                case 2:
                                                    echo "<td>60 min</td>";
                                                    break;
                                                case 3:
                                                    echo "<td>90 min</td>";
                                                    break;
                                                case 4:
                                                    echo "<td>120 min</td>";
                                                    break;
                                            }
                                            echo '<td>' . $service["service_price"] . '.00 din</td></tr>';
                                        }

                                        echo '
                                                </tbody>
                                            </table>
                                        <hr>
                                        ';
                                    }
                                    ?>




                                    <form action="" method="POST">
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="service_name">Naziv</label>
                                                <input type="text" class="form-control" name="service_name" id="service_name" placeholder="Naziv usluge" <?php echo $service_name_value; ?> required>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="service_dur">Vreme</label>
                                                <select name="service_dur" id="service_dur" class="form-control custom-select" required>
                                                    <option value="" selected disabled>Izaberi</option>
                                                    <option value='1'>30 min</option>
                                                    <option value='2'>60 min</option>
                                                    <option value='3'>90 min</option>
                                                    <option value='4'>120 min</option>
                                                </select>

                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="service_price">Cena</label>
                                                <input type="number" class="form-control" name="service_price" id="service_price" placeholder="Cena" <?php echo $service_price_value; ?> required min="0">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="service_desc">Opis usluge</label>
                                            <textarea id="service_desc" name="service_desc" class="form-control" placeholder="Opis usluge..." required><?php echo $service_desc; ?></textarea>
                                        </div>
                                        <a href="provider_profile.php" type="button" class="btn btn-primary float-left"><i class="fas fa-times"></i> &nbsp; zatvori<b>CENOVNIK</b></a>

                                        <button type="submit" value="cenovnik" name="btn" class="btn btn-success float-right"><i class="fas fa-plus"></i> dodaj<b>USLUGU</b></button>
                                    </form>


                                </div>
                                <!-- /.card-body -->

                            </div>

                        </div>
                        <div class="col-md-4">


                        </div>


                    </div>


                    <!-- /.row -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->




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