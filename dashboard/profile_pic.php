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
// var_dump($_SESSION);
// protect_page();

if (isset($_SESSION['user_id'])) {
    $user_id = $mysqli->escape_string($_SESSION['user_id']);
    $user = get_user($user_id);
    $user_name = $user['name'];
    $email = $user['email'];
    $adresa = $user['adresa'];
    $grad = $user['grad'];
    $kraj = $user['kraj'];
    $phone = $user['phone'];
    $napomena = $user['napomena'];
} else {
    header('Location: ' . $sajt . 'dashboard/logout.php');
}


?>

<body>
    <div class="container">

        <!-- Content Wrapper. Contains page content -->
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="logout.php" class="btn btn-sm btn-outline-primary">log<strong>OUT</strong></a>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-4">

                        <!-- Widget: user widget style 2 -->
                        <div class="card card-widget widget-user-2">


                            <?php
                            if (isset($_POST['btn']) && $_POST['btn'] == '1') {
                                include 'info.php';
                            }
                            ?>
                            <div class="card card-success">
                                <div class="card-header">
                                    <p class="card-title">postavi<b>SLIKU</b></p>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="dodajRADNIKA">
                                            <i class="fas fa-minus"></i></button>
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

                            <hr>
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-primary">
                                <div class="widget-user-image">
                                    <img class="img-circle elevation-2" src="img/avatar.png" alt="User Avatar">
                                </div>
                                <!-- /.widget-user-image -->
                                <h3 class="widget-user-username"><?php echo $user_name; ?></h3>
                                <button id="mySubmit" name="btn" value="1" type="submit" class="btn btn-success float-right">Izmeni sliku</button>

                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <form action="" method="post">
                                        <div class="form-group row d-flex justify-content-center">
                                            <div class="col-sm-5 border-right border-left ">
                                                <label for="adresa">Adresa</label>
                                                <input class="form-control form-control-sm" name="adresa" id="adresa" type="text" value="<?php echo $user['adresa']; ?>">
                                            </div>
                                            <div class="col-sm-3 border-right border-left">
                                                <label for="grad">Grad</label>
                                                <input class="form-control form-control-sm" name="grad" id="grad" type="text" value="<?php echo $user['grad']; ?>">
                                            </div>
                                            <div class="col-sm-3 border-right border-left">
                                                <label for="kraj">Kraj</label>
                                                <input class="form-control form-control-sm" name="kraj" id="kraj" type="text" value="<?php echo $user['kraj']; ?>">
                                            </div>
                                        </div>
                                </div>
                                <button id="mySubmit1" name="btn" value="1" type="submit" class="btn btn-primary btn-block">Izmeni<b>_LOKACIJU</b></button>

                                </form>
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
                        <div class="card card-primary">
                            <div class="card-header p-2">
                                Info
                            </div>
                            <div class="card-body">

                                <form action="" method="post">
                                    <div class="row mb-2 mt-0">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <strong><i class="fas fa-phone mr-1"></i> Telefon</strong>

                                                <input name="phone" data-toggle="tooltip" data-placement="top" title="Unesite telefon" class="form-control form-control-sm" type="text" placeholder="Unesite telefon" value="<?php echo $phone; ?>" required>

                                                <strong><i class="far fa-envelope mr-1"></i> E-mail</strong>

                                                <input data-toggle="tooltip" data-placement="top" title="Unesite email" class="form-control form-control-sm" type="text" placeholder="Unesite email" value="<?php echo $email; ?>" disabled>


                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-8">
                                            <div class="description-block">
                                                <strong><i class="fas far fa-file-alt mr-1"></i> Nešto o meni...</strong>
                                                <textarea name="napomena" class="form-control form-control-sm" rows="4" placeholder="Nešto o meni..."><?php echo $napomena; ?></textarea>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>

                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                    <button id="mySubmit2" name="btn" value="2" type="submit" class="btn btn-primary btn-block">Sačuvaj<b>_IZMENE</b></button>
                                </form>

                            </div>
                            <!-- /.card-body -->

                            <!-- /.row -->
                        </div>

                    </div>

                </div>

                <!-- /.row -->


                <!-- /.card -->
            </div>
            <!-- /.col -->

            <p class="mb-0 text-center alertPulse-css">
                <a class="btn btn-primary alertPulse2-css" href="<?php echo $site_address; ?>" class="text-center"><strong><?php echo $site_address; ?></strong></a>
            </p>



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