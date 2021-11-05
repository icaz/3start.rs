<?php
$provider = get_provider($provider_id);
$name = $provider['name'];
$email = $provider['email'];
$phone = $provider['phone'];
$about = $provider['about'];
$avatar = $provider['avatar'];
?>
<!-- Widget: user widget style 1 -->
<div class="card card-widget widget-user card-outline card-primary bg-dark">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="card-header">
        <h5 class="text-center p-0 m-0"><strong><?php echo $name; ?></strong></h5>
    </div>
    <div class="widget-user-header" style="background: url('./img/bg2.jpg') center center;">
        <div class="widget-user-image">
            <img class="img-circle elevation-2" src="<?php echo $avatar; ?>" alt="User Avatar">
        </div>
    </div>
    <div class="card-body border-top text-center bg-dark">
        <div class="row text-center">
            <div class="col-sm-6 border-right border-left">
                <h5 class="description-header">Email</h5>
                <span class="description-text"><?php echo $email; ?></span>
            </div>
            <div class="col-sm-6 border-right border-left">
                <h5 class="description-header">Telefon</h5>
                <span class="description-text"><?php echo $phone; ?></span>
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