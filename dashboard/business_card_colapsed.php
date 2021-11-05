<div class="card card-primary card-outline bg-dark collapsed-card">
    <div class="card-header">
        <p class="card-title">
            <strong>
                <?php
                echo $salon_name;
                ?>
            </strong>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="SALON">
                <i class="fas fa-plus"></i></button>
        </div>
    </div>
    <div class="card-body border-top">
        <div class="row mb-2 mt-0">
            <div class="col-sm-4 border-right">
                <div class="description-block">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle bg-light" src="img/salon_avatar.png" alt="User profile picture">
                    </div>
                </div>
                <!-- /.description-block -->
            </div>
            <div class="col-sm-8 border-right">
                <div class="description-block mb-0">
                    <h3><b><?php echo $salon_name; ?></b></h3>
                    <p class="description-header"><?php echo $salon_address; ?></p>
                    <p class="description-header"><?php echo $salon_phone; ?></p>
                    <div class="row text-center">

                        <div class="col-sm-12 border-top">
                            <small><span class="description-header">Br. Frizera</span></small>
                            <span class="badge badge-danger"><?php echo $br_frizera; ?></span>
                        </div>
                    </div>
                </div>
                <!-- /.description-block -->
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <a data-target="#deleteModal-<?php echo $salon_id; ?>" data-toggle="modal" type="button" class="btn btn-danger float-left"><i class="fas fa-times"></i> &nbsp; obriši<b>SALON</b></a>
        <a href="edit_salon.php" type="button" class="btn btn-primary float-right"><i class="fas fa-edit"></i> &nbsp; izmeni<b>SALON</b></a>
    </div>
</div>