<?php
session_start();
include 'init.php';
include 'db.php';
include 'func_user.php';
/////////////////// SAJT ///////////////////////////
$sajt = $_SESSION['site_address'];
/////////////////// SAJT ///////////////////////////

$name_validate = '';
$name_value = '';
$err_name = '';

$email_validate = '';
$email_value = '';
$err_email = '';

$phone_validate = '';
$phone_value = '';
$err_phone = '';

$pass_validate = '';
$err_pass = '';

$name_ok = false;
$name_exist = false;
$email_ok = false;

if (logged_in() == true) {
  header('Location: ' . $sajt . 'dashboard/logout.php');
  exit();
}

if (isset($_POST['btn']) && $_POST['btn'] == 'register') {
  $name = $mysqli->escape_string($_POST['name']);
  $email = $mysqli->escape_string($_POST['email']);
  $phone = $mysqli->escape_string($_POST['phone']);

  $name_value = ' value="' . $name . '"';
  $email_value = ' value="' . $email . '"';
  $phone_value = ' value="' . $phone . '"';

  $sql_user = "SELECT * FROM user WHERE `email`='$email'";

  if ($mysqli->query($sql_user)) {
    $result_user = $mysqli->query($sql_user);
    if ($result_user->num_rows == 1) {
      $err_email = '<div class="valid-feedback">E-mail <u><strong>' . $email . '</strong></u> je već registrovan.</div>';
      $email_validate = ' is-invalid';
    } elseif ($result_user->num_rows != 1) {
      $sql_provider = "SELECT * FROM provider WHERE `email`='$email'";
      if ($mysqli->query($sql_provider)) {
        $result_provider = $mysqli->query($sql_provider);
        if ($result_provider->num_rows == 1) {
          $err_email = '<div class="valid-feedback">E-mail <u><strong>' . $email . '</strong></u> je registrovan.</div>';
          $email_validate = ' is-invalid';
        } elseif ($result_provider->num_rows == 0) {
          $email_validate = ' is-valid';
          $email_ok = true;
        }
      }
    }
  } // check 'email'
  $sql = "SELECT * FROM user WHERE name='$name'";
  if ($mysqli->query($sql)) {
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
      $_SESSION['warning_message'] = $name . ' je već registrovan, to možete kasnije promeniti u profilu...';
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
      $sql = 'INSERT INTO user (name, email, pass, hash, reg_date)'
        . "VALUES ('$name', '$email', '$pass', '$hash', '$register_date')";
      if ($mysqli->query($sql)) {
        echo $user_id = $mysqli->insert_id;

        $_SESSION['success_message'] = 'Uspešno ste se registrovali.';

        //include('mail_it.php');
        //mail_register($email, $name, $hash);

        if ($name_exist == true) {
          $_SESSION['warning_message'] = $name . ' je već registrovan, to možete kasnije promeniti u profilu...';
        }
        $_SESSION['logged_in'] = true;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['type'] = 'user';

        header('Location: profile.php');
      } else {
        $_SESSION['fail_message'] = 'Problem sa registracijom!';
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register Form</title>
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
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</head>

<body class="hold-transition login-page bg-dark">
  <div class="login-box bg-dark">
    <div class="login-logo bg-dark">
      <a href="dashboard/">Registruj<b>SE</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card p-3 m-0 border border-primary">
      <div class="card-body bg-light login-card-body rounded border border-primary">
        <?php
        include 'info.php';
        ?>
        <form action="register.php" method="post">
          <div class="input-group mb-3">
            <input name="name" type="text" class="form-control <?php echo $name_validate; ?>" placeholder="Ime..." <?php echo $name_value; ?> required autofocus autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div><?php echo $err_name; ?>
          </div>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control<?php echo $email_validate; ?>" placeholder="Email" <?php echo $email_value; ?> required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div><?php echo $err_email; ?>
          </div>
          <!-- <div class="input-group mb-3">
            <input id="phone" name="phone" type="tel" class="form-control <?php echo $phone_validate; ?>" placeholder="06x/ xx xx xxx" <?php echo $phone_value; ?> autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div><?php //echo $err_phone; 
                  ?>
          </div> -->
          <div class="input-group mb-3">
            <input type="password" name="pass" class="form-control<?php echo $pass_validate; ?>" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div><?php echo $err_pass; ?>
          </div>

          <div class="row">
            <div class="col-8"><a class="text-sm" href="login.php" class="text-center">Već sam registrovan</a>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button id="mySubmit" name="btn" value="register" type="submit" class="btn btn-sm btn-primary btn-block">RegistrujSE</button>
            </div>
            <!-- /.col -->
          </div>

        </form>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
  <hr>
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
<script>
  const phoneInputField = document.querySelector("#phone");
  const phoneInput = window.intlTelInput(phoneInputField, {
    preferredCountries: ["rs", "hr"],
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
  });
</script>

</html>