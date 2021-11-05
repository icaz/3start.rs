<div class="card card-primary card-outline bg-dark">
    <div class="card-header">
        <p class="card-title">dodaj<b>SALON</b></p>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="SALON">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body border-top">
        <form action="store_salon.php?frizer_id=<?php echo $frizer_id; ?>" method="post">
            <div class="row mb-2 mt-0">
                <div class="col-sm-6 border-right">
                    <div class="description-block">
                        <strong>Ime salona</strong>
                        <input name="salon_name" data-toggle="tooltip" data-placement="top" title="Ime Salona" class="form-control form-control-sm" type="text" placeholder="Ime Salona" <?php echo $salon_name_value; ?> required>
                        <strong>Adresa Salona</strong>
                        <input name="salon_address" data-toggle="tooltip" data-placement="top" title="Adresa Salona" class="form-control form-control-sm" type="text" placeholder="Adresa Salona" <?php echo $salon_address_value; ?> required>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <div class="description-block">
                        <strong>Telefon</strong>
                        <input name="salon_phone" data-toggle="tooltip" data-placement="top" title="Telefon" class="form-control form-control-sm" type="text" placeholder="Telefon" <?php echo $salon_phone_value; ?>>
                        <strong>Br. Frizera</strong>
                        <input name="br_frizera" data-toggle="tooltip" data-placement="top" title="Br. Frizera" class="form-control form-control-sm" type="number" placeholder="Br. Frizera" <?php echo $br_frizera_value; ?>>
                    </div>
                    <!-- /.description-block -->
                </div>
            </div>
            <button name="btn" value="salon" type="submit" class="btn btn-success float-right pulseAlert-css">dodaj<b>SALON</b></button>
        </form>
    </div>
    <!-- /.card-body -->
</div>