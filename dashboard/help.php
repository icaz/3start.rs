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

        #cats:hover {
            border: 1px solid whitesmoke;
            background-color: #333;
            color: whitesmoke;
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
                        <a href="edit_provider_profile.php" class="d-block active">Bogdan</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="business_profile.php" class="nav-link">
                                <i class="nav-icon fas fa-store"></i>
                                <p>Biznis profil <span class="right badge badge-danger">2</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="event_profile.php" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>Event <span class="right badge badge-danger">0</span></p>
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
                                <i class="nav-icon fab fa-ello"></i>
                                <p>Cenovnici</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="category.php" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
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

                    <small>

                        <div class="card text-center">
                            <div class="table-responsive">
                                <table class="table table-condensed table-sm table-borderless bg-light">
                                    <tr align="center">Novembar &nbsp;&nbsp;&nbsp;2021</tr>
                                    <tr align="center">
                                        <td>P</td>
                                        <td>U</td>
                                        <td>S</td>
                                        <td>Č</td>
                                        <td>P</td>
                                        <td>S</td>
                                        <td>N</td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-01" class="mb-1 btn btn-dark btn-xs ">01</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-02" class="mb-1 btn btn-outline-dark btn-xs ">02</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-03" class="mb-1 btn btn-outline-dark btn-xs ">03</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-04" class="mb-1 btn btn-outline-dark btn-xs ">04</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-05" class="mb-1 btn btn-outline-dark btn-xs ">05</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-06" class="mb-1 btn btn-outline-dark btn-xs ">06</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-07" class="mb-1 btn btn-outline-dark btn-xs ">07</a></td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-08" class="mb-1 btn btn-outline-dark btn-xs ">08</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-09" class="mb-1 btn btn-outline-dark btn-xs ">09</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-10" class="mb-1 btn btn-outline-dark btn-xs ">10</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-11" class="mb-1 btn btn-outline-dark btn-xs ">11</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-12" class="mb-1 btn btn-outline-dark btn-xs ">12</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-13" class="mb-1 btn btn-outline-dark btn-xs ">13</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-14" class="mb-1 btn btn-outline-dark btn-xs ">14</a></td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-15" class="mb-1 btn btn-outline-dark btn-xs ">15</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-16" class="mb-1 btn btn-outline-dark btn-xs ">16</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-17" class="mb-1 btn btn-outline-dark btn-xs ">17</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-18" class="mb-1 btn btn-outline-dark btn-xs ">18</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-19" class="mb-1 btn btn-outline-dark btn-xs ">19</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-20" class="mb-1 btn btn-outline-dark btn-xs ">20</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-21" class="mb-1 btn btn-outline-dark btn-xs ">21</a></td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-22" class="mb-1 btn btn-outline-dark btn-xs ">22</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-23" class="mb-1 btn btn-outline-dark btn-xs ">23</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-24" class="mb-1 btn btn-outline-dark btn-xs ">24</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-25" class="mb-1 btn btn-outline-dark btn-xs ">25</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-26" class="mb-1 btn btn-outline-dark btn-xs ">26</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-27" class="mb-1 btn btn-outline-dark btn-xs ">27</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-28" class="mb-1 btn btn-outline-dark btn-xs ">28</a></td>
                                    </tr>
                                    <tr>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-29" class="mb-1 btn btn-outline-dark btn-xs ">29</a></td>
                                        <td class="p-0 m-0" valign="top"><a href="dan.php?dan=2021-11-30" class="mb-1 btn btn-outline-dark btn-xs ">30</a></td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </small>
                </nav><!-- /.sidebar-menu -->
            </div><!-- /.sidebar -->
        </aside> <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-gray">
            <!-- Main content -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>
                                Bogdan </h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary card-outline bg-dark">
                                <div class="card-header">
                                    <p class="card-title">Spisak za korisnika<b>
                                            Bogdan </b></p>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>

                                </div>
                                <div class="card-body border-top table-responsive m-0 p-0">

                                    <table class="table table-condensed table-hover table-dark text-center">
                                        <thead>
                                            <tr>
                                                <th>Spisak poslovnica</th>
                                                <th>Adresa</th>
                                                <th>Cenovnik</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>naz</td>
                                                <td>adr</td>
                                                <td>
                                                    <a href="show_cenovnik.php?business_profile_id=8" type="button" class="btn btn-primary"><i class="fas fa-edit"></i> &nbsp; prikaži<b>CENOVNIK</b></a>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>naz2</td>
                                                <td>adre2</td>
                                                <td>
                                                    <a href="show_cenovnik.php?business_profile_id=9" type="button" class="btn btn-primary"><i class="fas fa-edit"></i> &nbsp; prikaži<b>CENOVNIK</b></a>

                                                </td>
                                            </tr>



                                        </tbody>

                                    </table>


                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">

                                </div>
                            </div>
                            <div class="card card-success bg-dark collapsed-card">
                                <div class="card-header">
                                    <p class="card-title">dodaj<b>BIZNIS</b></p>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="BIZNIS">
                                            <i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <form action="store_business_profile.php?provider_id=10" method="post">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle bg-light" src="img/blogo.png">
                                        </div>

                                        <div class="card-body border-top text-center bg-dark">

                                            <h5>Naziv</h5>
                                            <input name="name" class="form-control form-control-sm" type="text" placeholder="Naziv" required>

                                            <h5>Adresa</h5>
                                            <input name="address" class="form-control form-control-sm" type="text" placeholder="Adresa" required>



                                            <h5>Kategorije</h5>

                                            <div class="row">
                                                <div class="col-sm-4 border rounded">
                                                    <!-- checkbox -->
                                                    <div class="form-group text-left ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="27" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat1</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="31" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat1.1</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="32" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat1.2</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-right ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="34" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat1.2.1</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-right ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="35" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat1.2.2</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="33" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat1.3</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 border rounded">
                                                    <!-- checkbox -->
                                                    <div class="form-group text-left ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="28" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat2</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="39" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat2.1</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 border rounded">
                                                    <!-- checkbox -->
                                                    <div class="form-group text-left ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="29" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat3</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="36" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat3.1</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-right ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="38" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat3.1.1</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="37" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat3.2</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 border rounded">
                                                    <!-- checkbox -->
                                                    <div class="form-group text-left ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="40" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat4</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 border rounded">
                                                    <!-- checkbox -->
                                                    <div class="form-group text-left ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="41" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat5</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 border rounded">
                                                    <!-- checkbox -->
                                                    <div class="form-group text-left ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="42" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat6</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="43" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat6.1</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 border rounded">
                                                    <!-- checkbox -->
                                                    <div class="form-group text-left ">
                                                        <div class="form-check">
                                                            <input name="cat_id[]" value="44" class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">kat7</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h5>Telefon</h5>
                                                <div class="form-group">

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                        </div>
                                                        <input name="phone" type="text" class="form-control">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>

                                                <h5>Opis</h5>
                                                <textarea name="about" class="form-control form-control-sm" rows="4" placeholder="Detalji..."></textarea>


                                                <!-- /.description-block -->
                                                <!-- /.col -->


                                                <!-- /.row -->
                                                <hr>
                                                <button name="btn" value="business_profile" type="submit" class="btn btn-success float-right"><i class="fas fa-plus"></i> &nbsp; dodaj<b>BIZNIS</b></button>
                                            </div>

                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div> <!-- /.widget-user -->
                        </div>
                        <div class="col-md-6 text-center">

                            <!-- About Me Box -->
                            <div class="card card-widget widget-user card-outline card-primary bg-dark">
                                <div class="card-header">
                                    <div class="card-title">
                                        Galerija business
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                                            <a href="..\img\gallery\g1.jpg" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="mixedgallery">
                                                <img src="..\img\gallery\g1.jpg" class="img-fluid mb-2" alt="white sample" />
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                                            <a href="..\img\gallery\g2.jpg" data-toggle="lightbox" data-title="sample 2 - black" data-gallery="mixedgallery">
                                                <img src="..\img\gallery\g2.jpg" class="img-fluid mb-2" alt="black sample" />
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                                            <a href="..\img\gallery\g3.jpg" data-toggle="lightbox" data-title="sample 3 - red" data-gallery="mixedgallery">
                                                <img src="..\img\gallery\g3.jpg" class="img-fluid mb-2" alt="red sample" />
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                                            <a href="..\img\gallery\g4.jpg" data-toggle="lightbox" data-title="sample 4 - red" data-gallery="mixedgallery">
                                                <img src="..\img\gallery\g4.jpg" class="img-fluid mb-2" alt="red sample" />
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                                            <a href="..\img\gallery\g5.jpg" data-toggle="lightbox" data-title="sample 5 - black" data-gallery="mixedgallery">
                                                <img src="..\img\gallery\g5.jpg" class="img-fluid mb-2" alt="black sample" />
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                                            <a href="..\img\gallery\g6.jpg" data-toggle="lightbox" data-title="sample 6 - white" data-gallery="mixedgallery">
                                                <img src="..\img\gallery\g6.jpg" class="img-fluid mb-2" alt="white sample" />
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                                            <a href="..\img\gallery\g7.jpg" data-toggle="lightbox" data-title="sample 7 - white" data-gallery="mixedgallery">
                                                <img src="..\img\gallery\g7.jpg" class="img-fluid mb-2" alt="white sample" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img class="profile-user-img img-fluid bg-light" src="img/under.jpg">

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
    <!-- Ekko Lightbox -->
    <script src="admin/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

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
    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true,
                    showArrows: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>


</body>

</html>