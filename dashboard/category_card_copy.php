<div class="card card-widget widget-user card-outline card-primary bg-dark">

    <div class="card-body">

        <table class="table table-condensed table-dark table-bordered">
            <thead>
                <tr>
                    <th>kat1</th>
                    <th>kat2</th>
                    <th>kat3</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql1 = "SELECT * FROM category WHERE `parent_id`='0'";
                $result_category1 = $mysqli->query($sql1);
                $no_cat1 = $result_category1->num_rows;

                if ($no_cat1 > 0) {
                    while ($category1 = $result_category1->fetch_assoc()) {
                        $parent_id2 = $category1['id'];
                        echo "<tr>";
                        echo "<td id='cats' title='" .  $category1['name'] . "'>(" . $category1['id'] . ") " .  $category1['name'];
                ?><br>
                        <div class="btn-group btn-block" role="group" aria-label="Basic example">
                            <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-xs btn-primary float-right"><i class="fas fa-edit"></i> edit</a>
                            <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-xs btn-success float-right"><i class="fas fa-plus"></i> add</a>
                            <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-xs btn-danger float-right"><i class="fas fa-times"></i></a>

                        </div>
                        <?php

                        echo "</td>";
                        $sql2 = "SELECT * FROM category WHERE `parent_id`='$parent_id2'";
                        $result_category2 = $mysqli->query($sql2);
                        $no_cat2 = $result_category2->num_rows;


                        if ($no_cat2 > 0) {
                            while ($category2 = $result_category2->fetch_assoc()) {
                                $parent_id3 = $category2['id'];
                                echo "<td id='cats'>(" . $category2['id'] . ") b__" . $category2['name'] . " from - " . $category2['parent_id'];

                        ?><br>
                                <div class="btn-group btn-block" role="group" aria-label="Basic example">
                                    <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-xs btn-primary float-right"><i class="fas fa-edit"></i> edit</a>
                                    <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-xs btn-success float-right"><i class="fas fa-plus"></i> add</a>
                                    <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-xs btn-danger float-right"><i class="fas fa-times"></i></a>

                                </div>
                                <?php

                                echo "</td>";
                                $sql3 = "SELECT * FROM category WHERE `parent_id`='$parent_id3'";
                                $result_category3 = $mysqli->query($sql3);
                                $no_cat3 = $result_category3->num_rows;


                                if ($no_cat3 > 0) {
                                    while ($category3 = $result_category3->fetch_assoc()) {
                                        if ($no_cat3 > 1) {
                                            echo "<td id='cats'>(" . $category3['id'] . ") yyy" . $category3['name'] . " from - " . $category3['parent_id'];

                                ?><br>
                                            <div class="btn-group btn-block" role="group" aria-label="Basic example">
                                                <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-xs btn-primary float-right"><i class="fas fa-edit"></i> edit</a>
                                                <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-xs btn-success float-right"><i class="fas fa-plus"></i> add</a>
                                                <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-xs btn-danger float-right"><i class="fas fa-times"></i></a>

                                            </div>
                                        <?php


                                            echo "</td></tr>";
                                            echo "<tr><td></td><td></td>";
                                        } elseif ($no_cat3 == 1) {
                                            echo "<td id='cats'>(" . $category3['id'] . ") xxx" . $category3['name'] . "->" . $category3['parent_id'];

                                        ?><br>
                                            <div class="btn-group btn-block" role="group" aria-label="Basic example">
                                                <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-xs btn-primary float-right"><i class="fas fa-edit"></i> edit</a>
                                                <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-xs btn-success float-right"><i class="fas fa-plus"></i> add</a>
                                                <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-xs btn-danger float-right"><i class="fas fa-times"></i></a>

                                            </div>
                <?php


                                            echo "</td></tr>";
                                        }
                                        $no_cat3--;
                                    }
                                }
                                $no_cat2--;
                                if ($no_cat2 > 0) {
                                    echo "<td></td>";
                                }
                            }
                        }
                    }
                    $no_cat1--;
                    if ($no_cat1 > 0) {
                        echo "<td></td><td></td>";
                    }
                }


                ?>
                <tr>
                    <td colspan="3" id='cats'> <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-success float-left"><i class="fas fa-plus"></i> &nbsp; dodaj<b>KATEGORIJU</b></a>
                    </td>
                </tr>
            </tbody>
        </table>


    </div>
</div>