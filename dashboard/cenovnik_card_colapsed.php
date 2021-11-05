<div class="card card-primary card-outline bg-dark collapsed-card">
    <div class="card-header">
        <p class="card-title">cenovnik za<b>
                <?php
                echo $salon_name;
                ?>
            </b></p>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-plus"></i></button>
        </div>

    </div>
    <div class="card-body border-top table-responsive m-0 p-0">

        <table class="table table-condensed table-hover table-dark">
            <thead>
                <tr>
                    <th>Usluga</th>
                    <th style="width: 100px">Vreme</th>
                    <th style="width: 100px">Cena</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $services = $result_cenovnik->fetch_all(MYSQLI_ASSOC);
                foreach ($services as $service) {

                    echo '<tr class="clickable-tr" href="edit_cenovnik.php?frizer_id=' . $frizer_id . '&salon_id=' . $salon_id . '"><td>' . $service["service_name"] . '</td>';

                    switch ($service['service_dur']) {
                        case 1:
                            echo "<td>30 min</td>";
                            break;
                        case 2:
                            echo "<td>60 min</td>";
                            break;
                        case 3:
                            echo "<td>90 min</td>";
                            break;
                        case 4:
                            echo "<td>120 min</td>";
                            break;
                    }
                    echo '<td>' . $service["service_price"] . '.00din</td></tr>';
                }

                ?>



            </tbody>

        </table>


    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <a href="delete_cenovnik.php?salon_id=<?php echo $salon_id; ?>" type="button" class="btn btn-danger float-left"><i class="fas fa-times"></i> &nbsp; obriši<b>CENOVNIK</b></a>
        <a href="show_cenovnik.php?salon_id=<?php echo $salon_id; ?>" type="button" class="btn btn-primary float-right"><i class="fas fa-edit"></i> &nbsp; prikaži<b>CENOVNIK</b></a>
    </div>
</div>