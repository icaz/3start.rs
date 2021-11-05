<div class="card card-primary card-outline bg-dark">
    <div class="card-header">
        <p class="card-title">Spisak poslovnica za korisnika<b>
                <?php
                echo $name;
                ?>
            </b></p>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
        </div>

    </div>
    <div class="card-body border-top table-responsive m-0 p-0">

        <table class="table table-condensed table-hover table-dark text-center">
            <thead>
                <tr>
                    <th>Spisak poslovnica</th>
                    <th>Adresa</th>
                    <th>Cenovnik</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM business_profile WHERE provider_id='$provider_id'";
                if ($mysqli->query($sql)) {
                    $result_business_profile = $mysqli->query($sql);
                    if ($result_business_profile->num_rows > 0) {
                        $br_business_profile = $result_business_profile->num_rows;
                        while ($business_profile = $result_business_profile->fetch_assoc()) {
                            $business_profile_id = $business_profile['id'];
                            $business = get_business($business_profile_id);
                            $business_name = $business['name'];
                            $business_logo = $business['logo'];
                            $business_address = $business['address'];
                            $business_phone = $business['phone'];
                            $business_about = $business['about'];
                ?>
                            <tr>
                                <td><?php echo $business_name; ?></td>
                                <td><?php echo $business_address; ?></td>
                                <td>
                                    <a href="show_cenovnik.php?business_profile_id=<?php echo $business_profile_id; ?>" type="button" class="btn btn-primary"><i class="fas fa-edit"></i> &nbsp; prikaži<b>CENOVNIK</b></a>

                                </td>
                            </tr>
                <?php
                        }
                    }
                }



                ?>



            </tbody>

        </table>


    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
</div>