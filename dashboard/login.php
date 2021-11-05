<?php
session_start();
include 'init.php';
include 'db.php';
include 'func_user.php';
include 'func_provider.php';
/////////////////// SAJT ///////////////////////////
$sajt = $_SESSION['site_address'];
/////////////////// SAJT ///////////////////////////
$err_email = '';
$email_validate = '';
$email_value = '';
$err_pass = '';
$pass_validate = '';
$not_active = '';
$_SESSION['type'] = '';

if (logged_in() == true) {
  header('Location: ' . $sajt . 'dashboard/logout.php');
  exit();
}
$email_ok = false;
include 'func_user.php';
$type = '';

if (isset($_POST['btn']) && $_POST['btn'] == 'login') {
  $email_validate = '';
  $email = $mysqli->escape_string($_POST['email']);
  //header('Location: kategorija.php');

  $email_value = ' value="' . $email . '"';
  $sql_user = "SELECT * FROM user WHERE `email`='$email'";
  if ($mysqli->query($sql_user)) {
    $result_user = $mysqli->query($sql_user);
    if ($result_user->num_rows == 1) {
      $err_email = '<div class="valid-feedback">E-mail <u><strong>' . $email . '</strong></u> je registrovan.</div>';
      $email_validate = ' is-valid';
      $email_ok = true;
      $type = 'user';
      $user = get_user_by_mail($email);
      if (password_verify($_POST['pass'], $user['pass'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['type'] = 'user';
        header('Location: profile.php');
      } else {
        $pass_validate = ' is-invalid';
      }
    } elseif ($result_user->num_rows != 1) {
      $sql_provider = "SELECT * FROM provider WHERE `email`='$email'";
      if ($mysqli->query($sql_provider)) {
        $result_provider = $mysqli->query($sql_provider);
        if ($result_provider->num_rows == 1) {
          $err_email = '<div class="valid-feedback">E-mail <u><strong>' . $email . '</strong></u> je registrovan.</div>';
          $email_validate = ' is-valid';
          $email_ok = true;
          $type = 'provider';
          $provider = get_provider_by_mail($email);
          if (password_verify($_POST['pass'], $provider['pass'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['name'] = $provider['name'];
            $_SESSION['email'] = $provider['email'];
            $_SESSION['provider_id'] = $provider['id'];
            $_SESSION['type'] = 'provider';
            header('Location: provider_profile.php');
          } else {
            $pass_validate = ' is-invalid';
          }
        } elseif ($result_provider->num_rows != 1) {
          $email_validate = ' is-invalid';
          $email_ok = false;
        }
      }
    }
  } // check 'email'
  if ($_SESSION['type'] == 'user') {
    header('Location: profile.php');
  }
  if ($_SESSION['type'] == 'provider') {
    $sql_provider = "SELECT * FROM provider WHERE `id`='$provider_id'";
    if ($mysqli->query($sql_provider)) {
      $result_provider = $mysqli->query($sql_provider);
      header('Location: provider_profile.php');
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Form</title>
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
  <script src="js/validation.js" type="text/javascript"></script>
  <script src="js/showpass.js" type="text/javascript"></script>
</head>

<body class="hold-transition login-page bg-dark">
  <div class="login-box bg-dark">
    <div class="login-logo bg-dark">
      <a href="dashboard/">Log<b>IN</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card p-3 m-0 border border-primary">
      <div class="card-body bg-light login-card-body rounded border border-primary">
        <?php
        include 'info.php';
        ?>
        <form action="login.php" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control<?php echo $email_validate; ?>" placeholder="Email" <?php echo $email_value; ?> required autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div><?php echo $err_email; ?>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="pass" class="form-control<?php echo $pass_validate; ?>" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div><?php echo $err_pass; ?>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" name="rememberme" id="rememberme" value='set'>
                <label class="custom-control-label" for="rememberme"><em>Zapamti me</em></label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button id="mySubmit2" name="btn" value="login" type="submit" class="btn btn-sm btn-primary btn-block">Log<b>IN</b></button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mb-1">
          <a class="text-sm" href="forgot-password.php">Zaboravio sam lozinku</a>
        </p>
        <p class="mb-0">
          <a class="text-sm" href="register.php" class="text-center">Registruj se</a>
        </p>
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

</html>