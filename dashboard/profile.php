<?php
session_start();

include 'init.php';


if (isset($_SESSION['site_address'])) {
    $site_address = $_SESSION['site_address'];
} else {
    $site_address = $sajt;
}
include 'db.php';
include 'func_user.php';
include 'head_pic.php';
protect_page();
if (isset($_SESSION['user_id'])) {
    $user_id = $mysqli->escape_string($_SESSION['user_id']);
    $user = get_user($user_id);
    $user_name = $user['name'];
    $avatar = $user['avatar'];
    $email = $user['email'];
    $address = $user['address'];

    $phone = $user['phone'];
    $about = $user['about'];
} else {
    header('Location: ' . $sajt . 'dashboard/logout.php');
}
if (check_user_name($user_name)) {
    $same_user_name = '<div class="alert alert-warning alert-dismissible text-center" id="walert">
    <button type="button" class="close  float-right" data-dismiss="alert">&times;</button>
        Postoji korisnik registrovan sa istim imenom.
        <a href="check_names.php" class="btn btn-success btn-sm float-right">Pogledaj</a>
    </div>';
} else {
    $same_user_name = '';
}

if (isset($_POST['btn']) && $_POST['btn'] == 'update') {
    $adresa = $mysqli->escape_string($_POST['adresa']);
    $grad = $mysqli->escape_string($_POST['grad']);
    $kraj = $mysqli->escape_string($_POST['kraj']);

    $sql = "UPDATE user SET `adresa`='$adresa', `grad`='$grad', `kraj`='$kraj' WHERE id=$user_id";
    if ($mysqli->query($sql)) {
        $_SESSION['success_message'] = 'Uspešno ste izmenili LOKACIJU.';
        $user_id = $_SESSION['user_id'];
        $user = get_user($user_id);
        $email = $user['email'];
        $adresa = $user['adresa'];
        $grad = $user['grad'];
        $kraj = $user['kraj'];
        $phone = $user['phone'];
        $napomena = $user['napomena'];
    }
}
if (isset($_POST['btn']) && $_POST['btn'] == '2') {
    $name = $mysqli->escape_string($_POST['name']);
    $phone = $mysqli->escape_string($_POST['phone']);
    $napomena = $mysqli->escape_string($_POST['napomena']);


    $sql = "UPDATE user SET `name`='$name', `phone`='$phone', `napomena`='$napomena' WHERE id=$user_id";
    if ($mysqli->query($sql)) {
        $_SESSION['success_message'] = 'Uspešno ste izmenili INFO.';

        $user_id = $_SESSION['user_id'];
        $user = get_user($user_id);
        $email = $user['email'];
        $adresa = $user['adresa'];
        $grad = $user['grad'];
        $kraj = $user['kraj'];
        $phone = $user['phone'];
        $napomena = $user['napomena'];
    }
}

?>

<body>
    <div class="container bg-gray">
        <!-- Content Wrapper. Contains page content -->
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i><?php echo ucwords($danas); ?></i></h1>
                    </div>
                    <div class="col-sm-6">

                        <a class="btn btn-primary alertPulse2-css" href="register_provider.php" class="text-center"><strong>registruj se kao provider usluga....</strong></a>


                        <ol class="breadcrumb float-sm-right">
                            <a href="logout.php" class="btn btn-sm btn-outline-primary bg-dark">log<strong>OUT</strong></a>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content" style="box-shadow: 5px 10px 18px #888888;">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-4">

                        <div class="alert alert-danger alert-dismissible text-center" id="falert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            REGISTRUJ SE KAO PROVAJDER!
                        </div>




                        <!-- Widget: user widget style 2 -->


                        <?php
                        if (isset($_POST['btn']) && $_POST['btn'] == '1') {
                            include 'info.php';
                        }
                        ?>
                        <?php
                        include 'user_profile_card.php';
                        ?>

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
                    </div>

                    <div class="col-md-8">
                        <?php
                        if (isset($_POST['btn']) && $_POST['btn'] == '2') {
                            include 'info.php';
                        }
                        ?>

                        <!-- About Me Box -->
                        <?php
                        include 'gallery_card.php';
                        ?>

                        <div class="alert alert-danger alert-dismissible text-center" id="falert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            REGISTRUJ SE KAO PROVAJDER!
                            <br>
                            <a class="btn btn-primary alertPulse2-css" href="register_provider.php" class="text-center"><strong>registruj se kao provider usluga....</strong></a>

                        </div>

                    </div>

                </div>

                <?php
                if ($same_user_name != '') {
                    echo $same_user_name;
                }
                ?>

                <!-- /.row -->


                <!-- /.card -->
            </div>
            <!-- /.col -->
            <br>
            <p class="mb-0 text-center alertPulse-css">
                <a class="btn btn-primary alertPulse2-css" href="<?php echo $site_address; ?>" class="text-center"><strong><?php echo $site_address; ?></strong></a>
            </p>
            <br>


    </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->

    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    </div>
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI -->
    <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Ekko Lightbox -->
    <script src="admin/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <!-- Filterizr-->
    <script src="admin/plugins/filterizr/jquery.filterizr.min.js"></script>

    <!-- AdminLTE App -->
    <script src="admin/dist/js/adminlte.min.js"></script>
    <!-- Custom js -->
    <script src="js/croppie.js"></script>


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

    <!-- Page specific script -->
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