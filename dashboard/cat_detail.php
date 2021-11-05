<?php
$cat_id = $_POST['cat_id'];


$sql1 = "SELECT * FROM category";
if ($mysqli->query($sql1)) {
    $result_category1 = $mysqli->query($sql1);

    if ($result_category1->num_rows > 0) {
        $no_cat1 = $result_category1->num_rows;
        while ($category1 = $result_category1->fetch_assoc()) {
            echo "<tr><td>" . $category1['name'];

            if ($no_cat1 == 1) {
                echo '<br><input type="text" class="form-control" name="category1" placeholder="Kategorija 1">';
            }
            $no_cat1--;



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
                }
            } elseif ($result_category2->num_rows == 0) {
                echo "<td></td><td></td></tr>";
            }
        }
    } elseif ($result_category1->num_rows == 0) {
        echo "NO CATEGORY ENTERED YET!";
    }
}
