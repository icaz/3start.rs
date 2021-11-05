<div class="card card-widget widget-user card-outline card-primary bg-dark">

    <div class="card-body">


        <?php
        $sql1 = "SELECT * FROM category WHERE `parent_id`='0'";
        $result_category1 = $mysqli->query($sql1);
        $no_cat1 = $result_category1->num_rows;
        while ($category1 = $result_category1->fetch_assoc()) {
            $parent_id2 = $category1['id'];
            echo "<tr>";
            echo "<td>(" . $category1['id'] . ") " .  $category1['name'] . "</td>";
            $sql2 = "SELECT * FROM category WHERE `parent_id`='$parent_id2'";
            $result_category2 = $mysqli->query($sql2);
            $no_cat2 = $result_category2->num_rows;


            if ($no_cat2 > 0) {
                while ($category2 = $result_category2->fetch_assoc()) {
                    $parent_id3 = $category2['id'];
                    echo "<td>(" . $category2['id'] . ") b" . $category2['name'] . " from - " . $category2['parent_id'];
                    echo "</td>";
                    $sql3 = "SELECT * FROM category WHERE `parent_id`='$parent_id3'";
                    $result_category3 = $mysqli->query($sql3);
                    $no_cat3 = $result_category3->num_rows;


                    if ($no_cat3 > 0) {
                        while ($category3 = $result_category3->fetch_assoc()) {
                            if ($no_cat3 > 1) {
                                echo "<td>(" . $category3['id'] . ") yyy" . $category3['name'] . " from - " . $category3['parent_id'];
                                echo "</td></tr>";
                                echo "<tr><td></td><td></td>";
                            } elseif ($no_cat3 == 1) {
                                echo "<td>(" . $category3['id'] . ") xxx" . $category3['name'] . "->" . $category3['parent_id'];
                                echo "</td></tr>";
                            }
                            $no_cat3--;
                        }
                    } elseif ($no_cat3 == 0) {
                        echo "<td>";
                        echo "</td></tr>";
                    }
                    $no_cat2--;
                }
            } elseif ($no_cat2 == 0) {
                echo "<br>";
            }
        }


        ?>


        </tbody>
        </table>


    </div>
</div>