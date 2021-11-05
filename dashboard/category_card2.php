<div class="card card-widget widget-user card-outline card-primary bg-dark">

    <div class="card-body">

        <table class="table table-condensed table-hover table-dark">
            <thead>
                <tr>
                    <th>kat1</th>
                    <th>kat2</th>
                    <th>kat3</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql1 = "SELECT * FROM category";
                if ($mysqli->query($sql1)) {
                    $result_category1 = $mysqli->query($sql1);

                    if ($result_category1->num_rows > 0) {
                        $no_cat1 = $result_category1->num_rows;
                        while ($category1 = $result_category1->fetch_assoc()) {
                            echo "<tr><td>" . $category1['name'];

                            // if ($no_cat1 == 1) {
                            //     echo '<br><input type="text" class="form-control" name="category1" placeholder="Kategorija 1">';
                            // }
                            // $no_cat1--;



                            echo "</td>";
                            $parent_id1 = $category1['id'];
                            $sql2 = "SELECT * FROM category WHERE `parent_id`='$parent_id1'";
                            $result_category2 = $mysqli->query($sql2);


                            if ($result_category2->num_rows > 0) {
                                while ($category2 = $result_category2->fetch_assoc()) {
                                    $parent_id2 = $result_category2['id'];
                                    $sql3 = "SELECT * FROM category WHERE `parent_id`='$parent_id2'";
                                    $result_category3 = $mysqli->query($sql3);
                                    echo "<td>" . $result_category2['name'] . "</td>";
                                    if ($result_category3->num_rows > 0) {
                                        while ($category3 = $result_category3->fetch_assoc()) {
                                            $parent_id3 = $result_category3['id'];
                                            $sql3 = "SELECT * FROM category WHERE `parent_id`='$parent_id2'";
                                            $result_category3 = $mysqli->query($sql3);
                                            echo "<td>" . $result_category2['name'] . "</td>";
                                        }
                                    } elseif ($result_category2->num_rows == 0) {
                                        echo "<td></td><td></td></tr>";
                                    }
                                }
                            } elseif ($result_category2->num_rows == 0) {
                                echo "<td></td><td></td></tr>";
                            }
                        }
                    } elseif ($result_category1->num_rows == 0) {
                        echo "NO CATEGORY ENTERED YET!";
                    }
                }

                ?>


                <tr>
                    <td> <a data-target="#deleteModal" data-toggle="modal" type="button" class="btn btn-success float-left"><i class="fas fa-plus"></i> &nbsp; dodaj<b>KATEGORIJU</b></a>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>


    </div>
</div>