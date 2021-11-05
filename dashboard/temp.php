<!DOCTYPE html>

<html lang="sr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Kontrolna tabla</title>
    <link rel="icon" href="img/favicon.png">

    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="admin/plugins/ekko-lightbox/ekko-lightbox.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Page specific style -->

    <!-- DataTables -->
    <link rel="stylesheet" href="admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        @keyframes pulseAlert {
            0% {
                color: red;
            }

            50% {
                color: white;
            }

            100% {
                color: red;
            }
        }

        .pulseAlert-css {
            animation: pulseAlert 2s ease-out;
            animation-iteration-count: infinite;
            color: white;
            /* you need this to specify a color to pulse to */
        }
    </style>
</head>

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
                    <a href="/../index.php" class="btn btn-sm btn-outline-light">Nazad na <strong> http://start.rs/</strong></a>
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
                        <a href="provider_profile.php?provider_id=1" class="d-block active">111</a>
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
                                <p>Biznis profil <span class="right badge badge-danger">0</span></p>
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
                                111 </h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Widget: user widget style 1 -->
                            <!-- Widget: user widget style 1 -->
                            <div class="card card-widget widget-user card-outline card-primary bg-dark">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="card-header">
                                    <h5 class="text-center p-0 m-0"><strong>111</strong></h5>
                                </div>
                                <div class="widget-user-header" style="background: url('./img/bg2.jpg') center center;">
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="img/avatar.png" alt="User Avatar">
                                    </div>
                                </div>
                                <div class="card-body border-top text-center bg-dark">
                                    <div class="row text-center">
                                        <div class="col-sm-6 border-right border-left">
                                            <h5 class="description-header">Email</h5>
                                            <span class="description-text">1@1</span>
                                        </div>
                                        <div class="col-sm-6 border-right border-left">
                                            <h5 class="description-header">Telefon</h5>
                                            <span class="description-text"></span>
                                        </div>
                                        <!-- /.description-block -->
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                    <hr>
                                    <a href="edit_provider_profile.php" type="button" class="btn btn-primary float-right"><i class="fas fa-edit"></i> &nbsp; izmeni<b>PROFIL</b></a>
                                </div>
                            </div>
                            <!-- /.widget-user -->
                            <!-- /.widget-user -->
                        </div>
                        <div class="col-md-8">

                            <div class="card card-widget widget-user card-outline card-primary bg-dark">

                                <div class="card-body">

                                    <table class="table table-condensed table-hover table-dark">
                                        <thead>
                                            <tr>
                                                <th>kat1</th>
                                                <th>kat2</th>
                                                <th>kat3</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>kat1 <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-xs btn-danger float-right"><i class="fas fa-times"></i></a>
                                                </td>
                                                <td>sub 1 <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-xs btn-danger float-right"><i class="fas fa-times"></i></a>
                                                </td>
                                            <tr>
                                                <td>sub 1 <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-xs btn-danger float-right"><i class="fas fa-times"></i></a>
                                                </td>
                                                <td> <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-success btn-xs"><i class="fas fa-plus"></i> &nbsp; dodaj<b>POD</b>kategoriju</a>
                                                </td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td> <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-success float-left"><i class="fas fa-plus"></i> &nbsp; dodaj<b>KATEGORIJU</b></a>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>


                                </div>
                            </div>


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