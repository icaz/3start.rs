<div class="card card-primary card-outline bg-dark">
    <div class="card-header">
        <p class="card-title">Radno vreme Salona</p>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="radnoVREME">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body border-top bg-dark">
        <?php
        $sql = "SELECT * FROM frizer_salon WHERE frizer_id='$frizer_id'";
        if ($mysqli->query($sql)) {
            $result_salon = $mysqli->query($sql);
            if ($result_salon->num_rows > 0) {
        ?>
                <nav>
                    <div class="nav nav-tabs mb-0" id="nav-tab" role="tablist">
                        <?php
                        $counter = 1;
                        while ($frizer_salon = $result_salon->fetch_assoc()) {
                            $salon_id = $frizer_salon['salon_id'];
                            $salon = get_salon($salon_id);
                            $rv_set = check_salon_radno_vreme($salon_id);
                            if ($rv_set != '') {
                                $pulse = ' pulseAlert-css';
                            } else {
                                $pulse = '';
                            }
                            $salon_name = $salon['salon_name'];
                            $br_frizera = $salon['br_frizera'];
                            if ($counter == 1) {
                        ?>
                                <a class="nav-item nav-link active" id="nav-<?php echo $salon_id; ?>-tab" data-toggle="tab" href="#nav-<?php echo $salon_id; ?>rv" role="tab" aria-controls="nav-<?php echo $salon_id; ?>rv" aria-selected="true"><?php echo $salon_name . $rv_set; ?></a>
                            <?php
                            } elseif ($counter > 1) {
                            ?>
                                <a class="nav-item nav-link" id="nav-<?php echo $salon_id; ?>-tab" data-toggle="tab" href="#nav-<?php echo $salon_id; ?>rv" role="tab" aria-controls="nav-<?php echo $salon_id; ?>rv" aria-selected="false"><?php echo $salon_name . $rv_set; ?></a>
                        <?php
                            }
                            $counter++;
                        }
                        ?>
                    </div>
                </nav>
                <div class="tab-content bg-white" id="nav-tabContent">
                    <?php
                    $sql = "SELECT * FROM frizer_salon WHERE frizer_id='$frizer_id'";
                    $result_salon = $mysqli->query($sql);
                    $counter = 1;
                    while ($frizer_salon = $result_salon->fetch_assoc()) {
                        $salon_id = $frizer_salon['salon_id'];
                        $salon = get_salon($salon_id);
                        $salon_name = $salon['salon_name'];
                        $salon_address = $salon['salon_address'];
                        $salon_phone = $salon['salon_phone'];
                        $br_frizera = $salon['br_frizera'];
                        if ($counter == 1) {
                    ?>
                            <div class="tab-pane fade show active" id="nav-<?php echo $salon_id; ?>rv" role="tabpanel" aria-labelledby="nav-<?php echo $salon_id; ?>-tab">
                                <?php include 'rv_tabela.php'; ?>

                            </div>
                        <?php
                        } elseif ($counter > 1) {
                        ?>
                            <div class="tab-pane fade" id="nav-<?php echo $salon_id; ?>rv" role="tabpanel" aria-labelledby="nav-<?php echo $salon_id; ?>-tab">

                                <?php include 'rv_tabela.php'; ?>

                            </div>
                    <?php
                        }
                        $counter++;
                    }
                    ?>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <!-- /.card-body -->
</div>