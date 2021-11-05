<?php
session_start();
include 'init.php';
include 'db.php';
include 'func_user.php';
include 'func_salon.php';
protect_page();
if (isset($_SESSION['frizer_id'])) {
    $frizer_id = $_SESSION['frizer_id'];
} elseif (isset($_SESSION['user_id'])) {
    header('Location: ' . $sajt . 'dashboard/profile.php');
} else {
    header('Location: ' . $sajt . 'dashboard/logout.php');
}
if ($_SESSION['type'] == 'frizer') {
    $sql_frizer = "SELECT * FROM frizer WHERE `id`='$frizer_id'";
    if ($mysqli->query($sql_frizer)) {
        $result_frizer = $mysqli->query($sql_frizer);
        // $finished == $frizer['fin'];
        // if ($finished == 0) {
        //     header('Location: finish_provider_profile.php?frizer_id=' . $_SESSION['frizer_id']);
        // } elseif ($finished == 1) {
        //     header('Location: provider_profile.php?frizer_id=' . $_SESSION['frizer_id']);
        // }
    }
}
$salon_name_value = ' value=""';
$salon_address_value = ' value=""';
$salon_phone_value = ' value=""';
$br_frizera_value = ' value="1"';

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
include 'head_pic.php';
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
                            <!-- Widget: user widget style 1 -->
                            <?php
                            include 'edit_frizer_card.php';
                            ?>
                            <!-- /.widget-user -->
                        </div>
                        <div class="col-md-4">
                            <div class="card card-success card-outline collapsed-card bg-dark">
                                <div class="card-header">
                                    <p class="card-title">izmeni<b>SLIKU</b></p>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="postaviSLIKU">
                                            <i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body text-center">

                                    <div id="upload-demo"></div>
                                    <br>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">

                                    <hr>
                                    <label class="btn btn-primary" for="image">Izaberi sliku:</label>
                                    <input type="file" id="image" accept="image/*" style="display: none">
                                    <hr>
                                    <button class="btn btn-success btn-upload-image">Sačuvaj sliku</button>


                                </div>

                            </div>




                            <?php
                            if ($br_salona == 0) {
                                include 'no_salon_msg.php';
                                include 'add_salon_card.php';
                            } elseif ($br_salona > 0) {
                                $sql = "SELECT * FROM frizer_salon WHERE frizer_id='$frizer_id'";
                                if ($mysqli->query($sql)) {
                                    $result_salon = $mysqli->query($sql);
                                    if ($result_salon->num_rows > 0) {
                                        $br_salona = $result_salon->num_rows;
                                        while ($frizer_salon = $result_salon->fetch_assoc()) {
                                            $salon_id = $frizer_salon['salon_id'];
                                            $salon = get_salon($salon_id);
                                            $salon_name = $salon['salon_name'];
                                            $salon_address = $salon['salon_address'];
                                            $salon_phone = $salon['salon_phone'];
                                            $br_frizera = $salon['br_frizera'];
                                            include 'salon_card.php';
                                        }
                                    }
                                }
                            }
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
                                                include 'cenovnik_card.php';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                            <!-- /.card /////////////////////////////////////////////////////////////////////////////////// -->
                        </div>
                    </div> <!-- /.row -->
                    <?php
                    if ($br_salona == 0) {
                    } elseif ($br_salona > 0) {
                    ?>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                include 'r_vreme_card.php';
                                ?>
                            </div>
                        </div> <!-- /.row -->
                    <?php
                    }
                    ?>
                </div>
            </section>
        </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin/dist/js/adminlte.min.js"></script>
    <!-- Custom js -->
    <script src="js/croppie.js"></script>
    <!-- DataTables -->
    <script src="admin/plugins/datatables/jquery.dataTables.js"></script>
    <script src="admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <!-- page script -->
    <script type="text/javascript">
        var resize = $('#upload-demo').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: { // Default { width: 100, height: 100, type: 'square' } 
                width: 300,
                height: 300,
                type: 'circle' //square
            },
            boundary: {
                width: 300,
                height: 300
            }
        });


        $('#image').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                resize.croppie('bind', {
                    url: e.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
        });


        $('.btn-upload-image').on('click', function(ev) {
            resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(img) {
                $.ajax({
                    url: "croppie.php",
                    type: "POST",
                    data: {
                        "image": img
                    },
                    success: function(data) {
                        html = '<img src="' + img + '" />';
                        $("#preview-crop-image").html(html);
                        window.location.href = "profile.php";
                    }
                });
            });
        });
    </script>

    <script>
        $('.clickable-tr').on('click', function() {
            var myLink = $(this).attr('href');
            window.location.href = myLink;
        });
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