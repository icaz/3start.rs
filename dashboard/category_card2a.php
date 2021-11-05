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
                $mysqli->query($sql1);
                $result_category1 = $mysqli->query($sql1);
                while ($category1 = $result_category1->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $category1['id'] . "</td>";
                    echo "<td>" . $category1['name'] . "</td>";
                    echo "<td>" . $category1['parent_id'] . "</td>";
                    echo "</tr>";
                }


                ?>


            </tbody>
        </table>


    </div>
</div>