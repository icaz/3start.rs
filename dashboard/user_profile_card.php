<?php
$user = get_user($user_id);
$user_name = $user['name'];
$avatar = $user['avatar'];
$email = $user['email'];
$address = $user['address'];

$phone = $user['phone'];
$about = $user['about'];
?>
<!-- Widget: user widget style 1 -->
<div class="card card-widget widget-user card-outline card-primary bg-dark">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="card-header">
        <h5 class="text-center p-0 m-0"><strong><?php echo $user_name; ?></strong></h5>
    </div>
    <div class="widget-user-header" style="background: url('./img/bg2.jpg') center center;">
        <div class="widget-user-image">
            <img class="img-circle elevation-2" src="<?php echo $avatar . '?=' . rand(1, 32000); ?>" alt="User Avatar">
        </div>
    </div>
    <div class="card-body border-top text-center bg-dark">
        <div class="row text-left">
            <div class="col-sm-6 border-right border-left">
                <span class="description-text"> <strong><i class="fas fa-envelope mr-1"></i> - </strong><?php echo $email; ?></span><br>
                <span class="description-text"> <strong><i class="fas fa-phone mr-1"></i> - </strong><?php echo $phone; ?></span><br>
                <span class="description-text"> <strong><i class="fas fa-address-card mr-1"></i></strong>Adresa:</span><br>
                <span class="description-text"> <?php echo $address; ?></span><br>


            </div>
            <div class="col-sm-6 border-right border-left">
                <span class="description-text"> <strong><i class="fas fa-book mr-1"></i></strong>Nešto o meni:</span><br>
                <textarea name="napomena" class="form-control form-control-sm" rows="4" placeholder="Nešto o meni..." disabled><?php echo $about; ?></textarea>

            </div>
            <!-- /.description-block -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <hr>
        <a href="edit_user_profile.php" type="button" class="btn btn-primary float-right"><i class="fas fa-edit"></i> &nbsp; izmeni<b>PROFIL</b></a>
    </div>
</div>
<!-- /.widget-user -->