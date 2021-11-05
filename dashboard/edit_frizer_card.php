<?php
$frizer_name_value = ' value="' . $name . '"';
$frizer_email_value = ' value="' . $email . '"';
$frizer_phone_value = ' value="' . $phone . '"';
?>
<!-- Widget: user widget style 1 -->
<div class="card card-widget widget-user card-outline card-primary bg-dark">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="card-header">
        <h5 class="text-center p-0 m-0"><strong><?php echo $name; ?></strong></h5>
    </div>
    <div class="widget-user-header" style="background: url('./img/bg2.jpg') center center;">
        <div class="widget-user-image">
            <img class="img-circle elevation-2" src="img/avatar4.jpg" alt="User Avatar">
        </div>
    </div>
    <div class="card-body border-top text-center bg-dark">
        <form action="store_frizer.php?frizer_id=<?php echo $frizer_id; ?>" method="post">

            <div class="row text-center">
                <div class="col-sm-12 border-right border-left">
                    <h5 class="description-header">Ime Frizera</h5>
                    <input name="name" data-toggle="tooltip" data-placement="top" title="Ime Frizera" class="form-control form-control-sm" type="text" placeholder="Ime Frizera" <?php echo $frizer_name_value; ?> required>
                </div>
            </div>
            <!-- /.row -->
            <hr>
            <div class="row text-center">
                <div class="col-sm-6 border-right border-left">
                    <h5 class="description-header">Email</h5>
                    <input name="email" data-toggle="tooltip" data-placement="top" title="Email Frizera" class="form-control form-control-sm" type="text" placeholder="Email Frizera" <?php echo $frizer_email_value; ?> disabled>
                </div>
                <div class="col-sm-6 border-right border-left">
                    <h5 class="description-header">Telefon</h5>
                    <input name="phone" data-toggle="tooltip" data-placement="top" title="Telefon Frizera" class="form-control form-control-sm" type="text" placeholder="Telefon Frizera" <?php echo $frizer_phone_value; ?> required>
                </div>
            </div>
            <!-- /.row -->
            <hr>
            <button name="btn" value="frizer" type="submit" class="btn btn-primary float-right"><i class="fas fa-edit"></i> &nbsp; izmeni<b>PROFIL</b></button>
        </form>
    </div>
</div>
<!-- /.widget-user -->