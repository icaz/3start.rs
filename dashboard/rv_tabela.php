<form action="store_radno_vreme.php?salon_id=<?php echo $salon_id; ?>" method="post">

    <table style="text-align:center" id="calendar" class="table table-condensed table-sm table-bordered table-hover">
        <thead>
            <tr>
                <th>Pon</th>
                <th>Uto</th>
                <th>Sre</th>
                <th>Čet</th>
                <th>Pet</th>
                <th>Sub</th>
                <th>Ned</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql_rv = "SELECT * FROM radno_vreme WHERE salon_id='$salon_id'";
            $result_rv = $mysqli->query($sql_rv);
            if ($result_rv->num_rows == 0) {
                $pon = ['09:00',  '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];
                $uto = ['09:00',  '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];
                $sre = ['09:00',  '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];
                $cet = ['09:00',  '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];
                $pet = ['09:00',  '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];
                $sub = ['09:00',  '10:00', '11:00', '12:00', '13:00', '14:00', '15:00'];
                $ned = [];

                $rv_set = '<span class="badge badge-danger">  &nbsp; notSET</span>';
                $pulse = ' pulseAlert-css';
            } elseif ($result_rv->num_rows == 1) {
                $rv_set = '';
                $pulse = '';

                $sql_old3 = "SELECT * FROM radno_vreme WHERE salon_id='$salon_id'";
                if ($mysqli->query($sql_old3)) {
                    $result = $mysqli->query($sql_old3);
                    $salon_radno_vreme = get_salon_radno_vreme($salon_id);
                    $myJSONpon = $salon_radno_vreme['pon'];
                    $myJSONuto = $salon_radno_vreme['uto'];
                    $myJSONsre = $salon_radno_vreme['sre'];
                    $myJSONcet = $salon_radno_vreme['cet'];
                    $myJSONpet = $salon_radno_vreme['pet'];
                    $myJSONsub = $salon_radno_vreme['sub'];
                    $myJSONned = $salon_radno_vreme['ned'];

                    if ($myJSONpon == '') {
                        $pon = array();
                    } else {
                        $pon = json_decode($myJSONpon);
                    }
                    if ($myJSONuto == '') {
                        $uto = array();
                    } else {
                        $uto = json_decode($myJSONuto);
                    }
                    if ($myJSONsre == '') {
                        $sre = array();
                    } else {
                        $sre = json_decode($myJSONsre);
                    }
                    if ($myJSONcet == '') {
                        $cet = array();
                    } else {
                        $cet = json_decode($myJSONcet);
                    }
                    if ($myJSONpet == '') {
                        $pet = array();
                    } else {
                        $pet = json_decode($myJSONpet);
                    }
                    if ($myJSONsub == '') {
                        $sub = array();
                    } else {
                        $sub = json_decode($myJSONsub);
                    }
                    if ($myJSONned == '') {
                        $ned = array();
                    } else {
                        $ned = json_decode($myJSONned);
                    }
                }
            }

            foreach ($hours as $hour) {
                if (in_array($hour, $pon)) {
                    $check_pon = "checked";
                    $stil_pon = 'class="table-success"';
                } else {
                    $check_pon = "";
                    $stil_pon = 'class="table-danger"';
                }
                if (in_array($hour, $uto)) {
                    $check_uto = "checked";
                    $stil_uto = 'class="table-success"';
                } else {
                    $check_uto = "";
                    $stil_uto = 'class="table-danger"';
                }
                if (in_array($hour, $sre)) {
                    $check_sre = "checked";
                    $stil_sre = 'class="table-success"';
                } else {
                    $check_sre = "";
                    $stil_sre = 'class="table-danger"';
                }
                if (in_array($hour, $cet)) {
                    $check_cet = "checked";
                    $stil_cet = 'class="table-success"';
                } else {
                    $check_cet = "";
                    $stil_cet = 'class="table-danger"';
                }
                if (in_array($hour, $pet)) {
                    $check_pet = "checked";
                    $stil_pet = 'class="table-success"';
                } else {
                    $check_pet = "";
                    $stil_pet = 'class="table-danger"';
                }
                if (in_array($hour, $sub)) {
                    $check_sub = "checked";
                    $stil_sub = 'class="table-success"';
                } else {
                    $check_sub = "";
                    $stil_sub = 'class="table-danger"';
                }
                if (in_array($hour, $ned)) {
                    $check_ned = "checked";
                    $stil_ned = 'class="table-success"';
                } else {
                    $check_ned = "";
                    $stil_ned = 'class="table-danger"';
                }
            ?>
                <tr>
                    <td <?php echo $stil_pon; ?>><?php echo $hour; ?> <input type="checkbox" name="pon[]" value="<?php echo $hour; ?>" <?php echo $check_pon; ?>> </td>
                    <td <?php echo $stil_uto; ?>><?php echo $hour; ?> <input type="checkbox" name="uto[]" value="<?php echo $hour; ?>" <?php echo $check_uto; ?>> </td>
                    <td <?php echo $stil_sre; ?>><?php echo $hour; ?> <input type="checkbox" name="sre[]" value="<?php echo $hour; ?>" <?php echo $check_sre; ?>> </td>
                    <td <?php echo $stil_cet; ?>><?php echo $hour; ?> <input type="checkbox" name="cet[]" value="<?php echo $hour; ?>" <?php echo $check_cet; ?>> </td>
                    <td <?php echo $stil_pet; ?>><?php echo $hour; ?> <input type="checkbox" name="pet[]" value="<?php echo $hour; ?>" <?php echo $check_pet; ?>> </td>
                    <td <?php echo $stil_sub; ?>><?php echo $hour; ?> <input type="checkbox" name="sub[]" value="<?php echo $hour; ?>" <?php echo $check_sub; ?>> </td>
                    <td <?php echo $stil_ned; ?>><?php echo $hour; ?> <input type="checkbox" name="ned[]" value="<?php echo $hour; ?>" <?php echo $check_ned; ?>> </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="card-footer">
        <button name="btn" value="radno_vreme" type="submit" class="btn btx-lg btn-primary float-right<?php echo $pulse; ?>"><i class="fas fa-save"></i> &nbsp; sačuvaj<b>RADNOvreme</b></button>

    </div>
</form>