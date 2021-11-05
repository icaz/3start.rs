<div class="card card-primary card-outline bg-dark">
    <div class="card-header">
        <p class="card-title">Spisak dogadjaja za korisnika<b>
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
                    <th>Spisak dogadjaja</th>
                    <th>Datum</th>
                    <th>Detalji</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM event_profile WHERE provider_id='$provider_id'";
                if ($mysqli->query($sql)) {
                    $result_event_profile = $mysqli->query($sql);
                    if ($result_event_profile->num_rows > 0) {
                        $br_event_profile = $result_event_profile->num_rows;
                        while ($event_profile = $result_event_profile->fetch_assoc()) {
                            $event_profile_id = $event_profile['id'];
                            $event = get_event($event_profile_id);
                            $event_name = $event['name'];
                            $event_kad = $event['kad'];
                            $event_address = $event['address'];
                            $event_logo = $event['logo'];
                            $event_about = $event['about'];
                ?>
                            <tr>
                                <td><?php echo $event_name; ?></td>
                                <td><?php echo $event_address; ?></td>
                                <td>
                                    <a href="show_event.php?event_profile_id=<?php echo $event_profile_id; ?>" type="button" class="btn btn-primary"><i class="fas fa-edit"></i> &nbsp; prikaži<b>DOGADJAJ</b></a>

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