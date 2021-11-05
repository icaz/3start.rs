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
if (isset($GET['business_profile_id'])) {
    $business = get_business($business_profile_id);
    $business_name = $business['name'];
    $business_logo = $business['logo'];
    $business_address = $business['address'];
    $business_phone = $business['phone'];
    $business_about = $business['about'];
}
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
                        <div class="col-md-12">

                            <?php


                            ?>


                            <div class="card card-primary card-outline bg-dark">
                                <div class="card-header">
                                    <p class="card-title">cenovnik za<b>
                                            <?php
                                            echo $name;
                                            echo "(" . $provider_id . ")";
                                            ?>
                                        </b></p>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>

                                </div>
                                <div class="card-body border-top table-responsive">
                                    <?php
                                    $sql_cenovnik = "SELECT * FROM cenovnik WHERE provider_id='$provider_id'";
                                    if ($mysqli->query($sql_cenovnik)) {
                                        # code...

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
                                    }
                                    ?>




                                    <form action="store_cenovnik_service.php" method="POST">
                                        <input type="hidden" name="provider_id" value="<?php echo $provider_id; ?>">

                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="service_name">Naziv</label>
                                                <input type="text" class="form-control" name="service_name" id="service_name" placeholder="Naziv usluge" required>
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
                                                <input type="number" class="form-control" name="service_price" id="service_price" placeholder="Cena" required min="0">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="service_desc">Opis usluge</label>
                                            <textarea id="service_desc" name="service_desc" class="form-control" placeholder="Opis usluge..." required></textarea>
                                        </div>
                                        <a href="frizer_profile.php" type="button" class="btn btn-primary float-left"><i class="fas fa-times"></i> &nbsp; zatvori<b>CENOVNIK</b></a>

                                        <button type="submit" value="cenovnik" name="btn" class="btn btn-success float-right"><i class="fas fa-plus"></i> dodaj<b>USLUGU</b></button>
                                    </form>


                                </div>
                                <!-- /.card-body -->

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