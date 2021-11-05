<?php
date_default_timezone_set('Europe/Belgrade');
setlocale(LC_TIME, array('sr_CS.UTF-8', 'sr.UTF-8'));
setlocale(LC_ALL, 'sr_RS@latin');
$datum1 = date("Y-m-d");

$datum =  strftime("%A, %d. %B %Y.");
$datum = ucwords($datum);




$date = date_create("2021-10-19");
date_add($date, date_interval_create_from_date_string("1 days"));
$datum1 = date_format($date, "Y-m-d");
$datum1 = ucwords(strftime("%A, %d. %B %Y.", strtotime($datum1)));

date_add($date, date_interval_create_from_date_string("1 days"));
$datum2 = date_format($date, "Y-m-d");
$datum2 = ucwords(strftime("%A, %d. %B %Y.", strtotime($datum2)));

date_add($date, date_interval_create_from_date_string("1 days"));
$datum3 = date_format($date, "Y-m-d");
$datum3 = ucwords(strftime("%A, %d. %B %Y.", strtotime($datum3)));

// $danas1 = date("Y-m-d");
// $danas =  strftime("%A, %d. %B %Y.");
// $danas = ucwords($danas);


// $juce1 = date("Y-m-d", strtotime("-1 day"));
// $sutra1 = date("Y-m-d", strtotime("+1 day"));
// $juce = strftime("%A, %d. %B %Y.", strtotime($juce1));
// $juce = ucwords($juce);
// $sutra = strftime("%A, %d. %B %Y.", strtotime($sutra1));
// $sutra = ucwords($sutra);


?>
<!-- *************************************************************************** -->
<!-- ******************************** KALENDAR CARD **************************** -->
<!-- *************************************************************************** -->
<div class="card card-primary card-outline bg-light">
    <div class="card-body border-top text-center">
        <h4><?php echo $datum1; ?></h4>
        <table style="text-align:center" id="calendar" class="table table-condensed table-sm table-bordered table-hover">
            <thead>
                <tr>
                    <th width="40px"></th>
                    <th>
                    </th>
                </tr>
            </thead>
            <tbody>

                <?php

                $h = array();
                $desc = array();


                $keys = ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30'];
                foreach ($keys as $key) {
                    $h[$key] = 0;
                    $h['09:30'] = 2;
                    $status['09:30'] = 1;
                    $h['13:00'] = 4;
                    $status['13:00'] = 2;
                    $h['17:30'] = 3;
                    $status['17:30'] = 1;
                    $desc[$key] = 'alo1-' . $key;
                }


                $busy = 0;
                $tdesc = '';
                $style = ' class="table-success" ';
                foreach ($keys as $key) {
                    if ($h[$key] > 0) {
                        if ($status[$key] == 1) {
                            $style = ' class="table-danger" ';
                        }
                        if ($status[$key] == 2) {
                            $style = ' class="table-warning" ';
                        }
                        echo '<tr ' . $style . '>';
                        echo '<td>' . $key . '</td>';
                        echo '<td rowspan="' . $h[$key] . '">' . $desc[$key] . '</td></tr>';
                        $busy = $h[$key];
                    } else {
                        echo '<tr>';
                        echo '<td class="table-success">' . $key . '</td>';
                        if ($busy == 0) {
                            echo '<td class="clickable-td table-success" href="#commentModal" data-toggle="modal" data-vreme="' . $key . '"></td>';
                        }
                        echo '</tr>';
                    }
                    if ($busy > 0) {
                        $busy = $busy - 1;
                    }
                }
                ?>

            </tbody>

        </table>


        <!-- Button trigger modal -->
        <br>
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#commentModal">
            Zakaži
        </button>

    </div>
    <!-- /.card-body -->
</div>
<!-- Modal -->
<div class="modal fade bg-dark" id="commentModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm bg-dark" role="document">
        <div class="modal-content  bg-dark">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="Label"><?php echo $danas; ?> u <span id="test"></span></h5>
                <button name="body" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="reserve.php" method="POST">
                    <div class="form-group form-group-sm">
                        <textarea name="body" class="form-control" id="message-text" placeholder="Usluga"></textarea>
                        <input type="hidden" name="product_id" value="1">
                        <input id="uname" type="hidden" name="product_id" value="Nevena">

                    </div>


                    <div class="form-group form-group-sm">
                        <input name="author" type="text" class="form-control input-sm" id="comment-name" placeholder="Upit">
                    </div>
                    <div class="form-group form-group-sm">
                        <?php $a = rand(0, 10);
                        $b = rand(0, 10);
                        $c = $a + $b ?>
                        <input type="hidden" name="rnd_zbir" value="<?php echo $c; ?>">
                        <div class="input-group justify-content-center">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="zbir"><?php echo 'Koliko je: ' . $a . ' + ' . $b; ?></span>
                            </div>
                            <input id="zbir" name="zbir" type="number" size="3" class="form-control input-sm col-3" required>
                        </div>
                    </div>

            </div>

            <div class="modal-footer">



                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                <button type="submit" class="btn btn-primary">Zakaži</button>
                </form>
            </div>
        </div>
    </div>
</div>