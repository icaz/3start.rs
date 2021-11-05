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
                            include 'category_card.php';
                            ?>
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
        $('.mod').on('click', function() {
            var nparent_id = '';
            var parent_id = '';
            var id = '';
            var cat_name = '';
            var parent_id = $(this).data('parent_id');
            var id = $(this).data('id');
            var cat_name2 = $(this).data('cat_name');
            var cat_name = "Izmeni kategoriju <i><strong>" + cat_name2 + "</strong></i>";
            $('#cat_name').val(cat_name2);
            $('#lab').html(cat_name);
            $('#parent_id').val(parent_id);
            $('#id').val(id);
        });
    </script>
    <script>
        $('.nmod').on('click', function() {
            var nparent_id = '';
            var id = '';
            var cat_name = '';
            var nparent_id = $(this).data('nparent_id');
            if (nparent_id == "0") {
                var cat_name = "Dodaj novu kategoriju";
            } else {
                var cat_name2 = $(this).data('cat_name');
                var cat_name = "Dodaj novu podkategoriju za <i><strong>" + cat_name2 + "</strong></i>";
            }
            $('#cat_name').val(cat_name);
            $('#nparent_id').val(nparent_id);
            $('#nlab').html(cat_name);

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