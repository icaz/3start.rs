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

            <h5>Ime</h5>
            <input name="name" class="form-control form-control-sm" type="text" placeholder="Ime" <?php //echo $frizer_name_value; 
                                                                                                    ?> required>

            <h5>Adresa</h5>
            <input name="address" class="form-control form-control-sm" type="text" placeholder="Adresa" <?php //echo $frizer_name_value; 
                                                                                                        ?> required>

            <h5>E-mail</h5>
            <input name="email" class="form-control form-control-sm" type="text" placeholder="E-mail" <?php //echo $frizer_name_value; 
                                                                                                        ?> required>

            <h5>Telefon</h5>
            <input name="phone" class="form-control form-control-sm" type="text" placeholder="Telefon" <?php //echo $frizer_name_value; 
                                                                                                        ?>>

            <h5>Opis</h5>
            <textarea name="about" class="form-control form-control-sm" rows="4" placeholder="Detalji..."></textarea>


            <!-- /.description-block -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <hr>
        <a href="edit_provider_profile.php" type="button" class="btn btn-primary float-right"><i class="fas fa-edit"></i> &nbsp; izmeni<b>PROFIL</b></a>
    </div>
</div>
<!-- /.widget-user -->