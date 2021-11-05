<div class="card card-success bg-dark collapsed-card">
    <div class="card-header">
        <p class="card-title">dodaj<b>BIZNIS</b></p>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="BIZNIS">
                <i class="fas fa-plus"></i></button>
        </div>
    </div>
    <div class="card-body border-top">
        <form action="store_business_profile.php?provider_id=<?php echo $provider_id; ?>" method="post">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle bg-light" src="img/blogo.png">
            </div>

            <div class="card-body border-top text-center bg-dark">

                <h5>Naziv</h5>
                <input name="name" class="form-control form-control-sm" type="text" placeholder="Naziv" <?php //echo $frizer_name_value; 
                                                                                                        ?> required>

                <h5>Adresa</h5>
                <input name="address" class="form-control form-control-sm" type="text" placeholder="Adresa" <?php //echo $frizer_name_value; 
                                                                                                            ?> required>



                <h5>Kategorije</h5>

                <?php
                $sql1 = "SELECT * FROM category WHERE `parent_id`='0'";
                $result_category1 = $mysqli->query($sql1);
                $no_cat1 = $result_category1->num_rows;

                if ($no_cat1 > 0) {
                    $count1 = 1;
                    while ($category1 = $result_category1->fetch_assoc()) {
                        $parent_id2 = $category1['id'];
                        if ($count1 == 1) {
                            echo '<div class="row">';
                            echo '<div class="col-sm-4 border rounded">';
                            //c=1 
                ?>
                            <!-- checkbox -->
                            <div class="form-group text-left ">
                                <div class="form-check">
                                    <input name="cat_id[]" value="<?php echo $category1['id']; ?>" class="form-check-input" type="checkbox">
                                    <label class="form-check-label"><?php echo $category1['name']; ?></label>
                                </div>
                            </div>
                            <?php
                            $sql2 = "SELECT * FROM category WHERE `parent_id`='$parent_id2'";
                            $result_category2 = $mysqli->query($sql2);
                            $no_cat2 = $result_category2->num_rows;
                            if ($no_cat2 > 0) {
                                while ($category2 = $result_category2->fetch_assoc()) {
                                    $parent_id3 = $category2['id'];
                            ?>
                                    <div class="form-group text-center ">
                                        <div class="form-check">
                                            <input name="cat_id[]" value="<?php echo $category2['id']; ?>" class="form-check-input" type="checkbox">
                                            <label class="form-check-label"><?php echo $category2['name']; ?></label>
                                        </div>
                                    </div>
                                    <?php
                                    $sql3 = "SELECT * FROM category WHERE `parent_id`='$parent_id3'";
                                    $result_category3 = $mysqli->query($sql3);
                                    $no_cat3 = $result_category3->num_rows;

                                    if ($no_cat3 > 0) {

                                        while ($category3 = $result_category3->fetch_assoc()) {
                                    ?>
                                            <div class="form-group text-right ">
                                                <div class="form-check">
                                                    <input name="cat_id[]" value="<?php echo $category3['id']; ?>" class="form-check-input" type="checkbox">
                                                    <label class="form-check-label"><?php echo $category3['name']; ?></label>
                                                </div>
                                            </div>
                            <?php
                                        }
                                    }
                                }
                            }
                            echo '</div>';
                            $count1++;
                        } elseif ($count1 == 2) {
                            echo '<div class="col-sm-4 border rounded">';
                            //c=2

                            ?>
                            <!-- checkbox -->
                            <div class="form-group text-left ">
                                <div class="form-check">
                                    <input name="cat_id[]" value="<?php echo $category1['id']; ?>" class="form-check-input" type="checkbox">
                                    <label class="form-check-label"><?php echo $category1['name']; ?></label>
                                </div>
                            </div>
                            <?php
                            $sql2 = "SELECT * FROM category WHERE `parent_id`='$parent_id2'";
                            $result_category2 = $mysqli->query($sql2);
                            $no_cat2 = $result_category2->num_rows;
                            if ($no_cat2 > 0) {
                                while ($category2 = $result_category2->fetch_assoc()) {
                                    $parent_id3 = $category2['id'];
                            ?>
                                    <div class="form-group text-center ">
                                        <div class="form-check">
                                            <input name="cat_id[]" value="<?php echo $category2['id']; ?>" class="form-check-input" type="checkbox">
                                            <label class="form-check-label"><?php echo $category2['name']; ?></label>
                                        </div>
                                    </div>
                                    <?php
                                    $sql3 = "SELECT * FROM category WHERE `parent_id`='$parent_id3'";
                                    $result_category3 = $mysqli->query($sql3);
                                    $no_cat3 = $result_category3->num_rows;

                                    if ($no_cat3 > 0) {

                                        while ($category3 = $result_category3->fetch_assoc()) {
                                    ?>
                                            <div class="form-group text-right ">
                                                <div class="form-check">
                                                    <input name="cat_id[]" value="<?php echo $category3['id']; ?>" class="form-check-input" type="checkbox">
                                                    <label class="form-check-label"><?php echo $category3['name']; ?></label>
                                                </div>
                                            </div>
                            <?php
                                        }
                                    }
                                }
                            }
                            echo '</div>';
                            $count1++;
                        } elseif ($count1 == 3) {
                            echo '<div class="col-sm-4 border rounded">';
                            //c=3

                            ?>
                            <!-- checkbox -->
                            <div class="form-group text-left ">
                                <div class="form-check">
                                    <input name="cat_id[]" value="<?php echo $category1['id']; ?>" class="form-check-input" type="checkbox">
                                    <label class="form-check-label"><?php echo $category1['name']; ?></label>
                                </div>
                            </div>
                            <?php
                            $sql2 = "SELECT * FROM category WHERE `parent_id`='$parent_id2'";
                            $result_category2 = $mysqli->query($sql2);
                            $no_cat2 = $result_category2->num_rows;
                            if ($no_cat2 > 0) {
                                while ($category2 = $result_category2->fetch_assoc()) {
                                    $parent_id3 = $category2['id'];
                            ?>
                                    <div class="form-group text-center ">
                                        <div class="form-check">
                                            <input name="cat_id[]" value="<?php echo $category2['id']; ?>" class="form-check-input" type="checkbox">
                                            <label class="form-check-label"><?php echo $category2['name']; ?></label>
                                        </div>
                                    </div>
                                    <?php
                                    $sql3 = "SELECT * FROM category WHERE `parent_id`='$parent_id3'";
                                    $result_category3 = $mysqli->query($sql3);
                                    $no_cat3 = $result_category3->num_rows;

                                    if ($no_cat3 > 0) {

                                        while ($category3 = $result_category3->fetch_assoc()) {
                                    ?>
                                            <div class="form-group text-right ">
                                                <div class="form-check">
                                                    <input name="cat_id[]" value="<?php echo $category3['id']; ?>" class="form-check-input" type="checkbox">
                                                    <label class="form-check-label"><?php echo $category3['name']; ?></label>
                                                </div>
                                            </div>
                <?php
                                        }
                                    }
                                }
                            }
                            echo '</div>';
                            echo '</div>';
                            $count1 = 1;
                        }
                    }
                    if ($count1 != 1) {
                        echo '</div>';
                    }
                }

                ?>


                <h5>Telefon</h5>
                <div class="form-group">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input name="phone" type="text" class="form-control">
                    </div>
                    <!-- /.input group -->
                </div>

                <h5>Opis</h5>
                <textarea name="about" class="form-control form-control-sm" rows="4" placeholder="Detalji..."></textarea>


                <!-- /.description-block -->
                <!-- /.col -->


                <!-- /.row -->
                <hr>
                <button name="btn" value="business_profile" type="submit" class="btn btn-success float-right"><i class="fas fa-plus"></i> &nbsp; dodaj<b>BIZNIS</b></button>
            </div>

        </form>
    </div>
    <!-- /.card-body -->
</div>