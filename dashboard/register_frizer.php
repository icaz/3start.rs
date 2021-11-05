<?php
session_start();
include 'init.php';
include 'db.php';
include 'func_user.php';
/////////////////// SAJT ///////////////////////////
$sajt = $_SESSION['site_address'];
/////////////////// SAJT ///////////////////////////

$gender_ck_male = '';
$gender_ck_female = 'checked';
$gender_ck_unisex = '';


$name_validate = '';
$name_value = '';
$err_name = '';
$email_validate = '';
$email_value = '';
$err_mail = '';
$phone_validate = '';
$phone_value = '';
$err_phone = '';
$pass_validate = '';
$err_pass = '';

$name_ok = false;
$name_exist = false;
$email_ok = false;

if (isset($_POST['btn']) && $_POST['btn'] == '1') {
    if (isset($_POST['name']) && $_POST['name'] != '') {
        $name = $mysqli->escape_string($_POST['name']);
        $name_value = ' value="' . $name . '"';
        $sql = "SELECT * FROM frizer WHERE name='$name'";
        if ($mysqli->query($sql)) {
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
                $_SESSION['warning_message'] = 'Već postoji frizer sa imenom <strong> ' . $name . '.</strong><br> To možete kasnije promeniti u profilu...';
                $name_ok = true;
                $name_exist = true;
            } elseif ($result->num_rows == 0) {
                if (strlen($name) > 2) {
                    $name_validate = ' is-valid';
                    $name_ok = true;
                } else {
                    $name_validate = ' is-invalid';
                    $err_name = '<div class="invalid-feedback">Ime mora biti više od 2 karaktera</div>';
                }
            }
        }
    } // check 'name'

    if (isset($_POST['email']) && $_POST['email'] != '') {
        $email = $mysqli->escape_string($_POST['email']);
        $phone = $mysqli->escape_string($_POST['phone']);
        $gender = $mysqli->escape_string($_POST['gender']);
        switch ($gender) {
            case "0":
                $gender_ck_male = 'checked';
                $gender_ck_female = '';
                $gender_ck_unisex = '';
                break;
            case "1":
                $gender_ck_male = '';
                $gender_ck_female = 'checked';
                $gender_ck_unisex = '';
                break;
            case "2":
                $gender_ck_male = '';
                $gender_ck_female = '';
                $gender_ck_unisex = 'checked';
                break;
        }

        $email_value = ' value="' . $email . '"';
        $phone_value = ' value="' . $phone . '"';
        $sql_user = "SELECT * FROM user WHERE email='$email'";
        if ($mysqli->query($sql_user)) {
            $result_user = $mysqli->query($sql_user);
            if ($result_user->num_rows > 0) {
                $err_mail = '<div class="invalid-feedback">E-mail <u><strong>' . $email . '</strong></u> je već registrovan<br>kao korisnik.</div>';
                $email_validate = ' is-invalid';
            } elseif ($result_user->num_rows == 0) {
                $sql_frizer = "SELECT * FROM frizer WHERE email='$email'";
                if ($mysqli->query($sql_frizer)) {
                    $result_frizer = $mysqli->query($sql_frizer);
                    if ($result_frizer->num_rows > 0) {
                        $err_mail = '<div class="invalid-feedback">E-mail <u><strong>' . $email . '</strong></u> je već registrovan<br>kao frizer.</div>';
                        $email_validate = ' is-invalid';
                    } elseif ($result_frizer->num_rows == 0) {
                        $email_validate = ' is-valid';
                        $email_ok = true;
                    }
                }
            }
        }
    } // check 'email'
    if ($email_ok == true && $name_ok == true) {
        $pass = $mysqli->escape_string($_POST['pass']);

        if (strlen($pass) < 2) {
            $err_pass = '<div class="invalid-feedback">Lozinka ima manje od 2 karaktera.</div>';
            $pass_validate = ' is-invalid';
        } else {
            $reg_ip = $_SERVER['REMOTE_ADDR'];
            $hash = $mysqli->escape_string(md5(rand(0, 1000)));
            $pass = $mysqli->escape_string(password_hash($_POST['pass'], PASSWORD_BCRYPT));
            date_default_timezone_set('Europe/Belgrade');
            setlocale(LC_TIME, ['sr_CS.UTF-8', 'sr.UTF-8']);
            $register_date = date('Y-m-d H:i:s');
            echo $sql = 'INSERT INTO frizer (name, email, lozinka, hash, phone, reg_date, reg_ip, gender)'
                . "VALUES ('$name', '$email', '$pass', '$hash', '$phone', '$register_date', '$reg_ip', '$gender')";
            if ($mysqli->query($sql)) {
                $frizer_id = $mysqli->insert_id;

                // $_SESSION['success_message'] = 'Uspešno ste se registrovali.';

                //include('mail_it.php');
                //mail_register($email, $name, $hash);

                if ($name_exist == true) {
                    $_SESSION['warning_message'] = 'Već postoji korisnik sa imenom <strong> ' . $name . '.</strong><br> To možete kasnije promeniti u profilu...';
                }
                $_SESSION['logged_in'] = true;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['frizer_id'] = $frizer_id;
                $_SESSION['type'] = 'frizer';

                header('Location: provider_profile.php');
            } else {
                $_SESSION['fail_message'] = 'Problem sa registracijom!';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registracija</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition register-page bg-dark">
    <div class="register-box bg-dark">
        <div class="register-logo bg-dark">
            <a href="">Registruj<b>SE</b></a>
        </div>
        <?php
        include 'info.php';
        ?>
        <!-- /.login-logo -->
        <div class="card border border-primary">
            <div class="card-body register-card-body rounded">
                <h4 class="login-box-msg"><em><strong>Frizer</strong></em></h4>
                <?php
                include 'info.php';
                ?>
                <div class="tab-content rounded bg-light p-3 m-0 border border-primary" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-profil" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form action="register_frizer.php" method="post">
                            <div class="input-group mb-3">
                                <input name="name" type="text" class="form-control <?php echo $name_validate; ?>" placeholder="Ime frizera" <?php echo $name_value; ?> required autocomplete="off">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div><?php echo $err_name; ?>
                            </div>


                            <!-- firzer type -->
                            <div class="form-group text-center">

                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" value="0" <?php echo $gender_ck_male; ?>>Muški
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" value="1" <?php echo $gender_ck_female; ?>>Ženski
                                    </label>
                                </div>
                                <div class="form-check-inline disabled">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" value="2" <?php echo $gender_ck_unisex; ?>>UniSEX
                                    </label>
                                </div>
                            </div>

                            <!-- end frizer type -->


                            <div class="input-group mb-3">
                                <input id="email" name="email" type="email" class="form-control <?php echo $email_validate; ?>" placeholder="Email" <?php echo $email_value; ?> required autocomplete="off">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div><?php echo $err_mail; ?>
                            </div>
                            <div class="input-group mb-3">
                                <input id="phone" name="phone" type="text" class="form-control <?php echo $phone_validate; ?>" placeholder="06x/ xx xx xxx" <?php echo $phone_value; ?> autocomplete="off">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div><?php echo $err_phone; ?>
                            </div>
                            <div class="input-group mb-3">
                                <input id="passfield" name="pass" type="password" class="form-control <?php echo $pass_validate; ?>" placeholder="Lozinka min 8 karatera" autocomplete="off" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-eye"></span>

                                    </div>
                                </div>
                                <div id="pass_valid"></div>
                            </div>

                            <div class="row">
                                <div class="col-8"><a class="text-sm" href="login.php" class="text-center">Već sam registrovan</a>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button id="mySubmit" name="btn" value="1" type="submit" class="btn btn-sm btn-primary btn-block">RegistrujSE</button>
                                </div>
                                <!-- /.col -->
                            </div>

                        </form>


                    </div>

                </div>

            </div>
            <!-- /.form-box -->
            <div class="row">
                <div class="col-8">
                </div>
                <!-- /.col -->
                <?php
                //echo $message;
                ?>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
    <p class="mb-0 text-center">
        <a class="btn btn-primary" href="<?php echo $sajt; ?>" class="text-center"><strong><?php echo $sajt; ?></strong></a>
    </p>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>

    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

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