    <!-- Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="lab" class="modal-title bg-light"></h5>
                    <button name="body" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="store_category.php" method="POST">
                        <div class="form-group form-group-sm">
                            <input name="name" type="text" class="form-control input-sm" id="cat_name" placeholder="Naziv kategorije">

                            <input type="hidden" name="provider_id" id="provider_id" value="<?php echo $provider_id; ?>">
                            <input type="hidden" name="parent_id" id="parent_id" value="0">
                            <input type="hidden" name="id" id="id" value="0">
                        </div>
                </div>

                <div class="modal-footer">


                    <button type="submit" name="btn" value="delete" class="btn btn-danger float-left">Obriši</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>

                    <button type="submit" name="btn" value="store_cat" class="btn btn-primary float-right">Sačuvaj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- newModal -->
    <div class="modal fade" id="ncategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="nlab" class="modal-title bg-light"></h5>
                    <button name="body" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="new_category.php" method="POST">
                        <div class="form-group form-group-sm">
                            <input name="name" type="text" class="form-control input-sm" id="cat_name" placeholder="Naziv kategorije">
                            <input type="hidden" name="provider_id" id="provider_id" value="<?php echo $provider_id; ?>">

                            <input type="hidden" name="nparent_id" id="nparent_id" value="0">
                        </div>
                </div>

                <div class="modal-footer">


                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                    <button type="submit" name="btn" value="store_cat" class="btn btn-primary float-right">Sačuvaj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


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
                    ?>
                            <tr>
                                <td class="mod" href="#categoryModal" data-toggle="modal" data-cat_name="<?php echo $category1['name']; ?>" data-parent_id=0 data-id="<?php echo $category1['id']; ?>">
                                    <?php echo "(" . $category1['id'] . ") " .  $category1['name']; ?>
                                </td>

                                <?php
                                $sql2 = "SELECT * FROM category WHERE `parent_id`='$parent_id2'";
                                $result_category2 = $mysqli->query($sql2);
                                $no_cat2 = $result_category2->num_rows;
                                if ($no_cat2 == 0) {
                                ?>
                                    <td>
                                        <a data-target="#ncategoryModal" data-toggle="modal" data-cat_name="<?php echo $category1['name']; ?>" data-nparent_id="<?php echo $parent_id2; ?>" type="button" class="nmod btn btn-success"><i class="fas fa-plus"></i> add</a>
                                    </td>
                                    <td></td>
                            </tr>
                        <?php
                                }
                                if ($no_cat2 > 0) {
                        ?>

                            <td>
                                <a data-target="#ncategoryModal" data-toggle="modal" data-cat_name="<?php echo $category1['name']; ?>" data-nparent_id="<?php echo $parent_id2; ?>" type="button" class="nmod btn btn-success"><i class="fas fa-plus"></i> add</a>

                            </td>
                            <td></td>
                            </tr>
                            <?php
                                    while ($category2 = $result_category2->fetch_assoc()) {
                                        $parent_id3 = $category2['id'];
                            ?>
                                <tr>
                                    <td></td>
                                    <td class="mod" href="#categoryModal" data-toggle="modal" data-cat_name="<?php echo $category2['name']; ?>" data-id="<?php echo $category2['id']; ?>" data-parent_id="<?php echo $category2['parent_id']; ?>">
                                        <?php echo "(" . $category2['id'] . ")" . $category2['name']; ?>
                                    </td>
                                    </td>

                                    <?php

                                        $sql3 = "SELECT * FROM category WHERE `parent_id`='$parent_id3'";
                                        $result_category3 = $mysqli->query($sql3);
                                        $no_cat3 = $result_category3->num_rows;
                                        if ($no_cat3 == 0) {
                                    ?>
                                        <td>
                                            <a data-target="#ncategoryModal" data-toggle="modal" data-cat_name="<?php echo $category2['name']; ?>" data-nparent_id="<?php echo $parent_id3; ?>" type="button" class="nmod btn btn-success"><i class="fas fa-plus"></i> add</a>
                                        </td>
                                </tr>
                            <?php
                                        }

                                        if ($no_cat3 > 0) {
                            ?>
                                <td>
                                    <a data-target="#ncategoryModal" data-toggle="modal" data-cat_name="<?php echo $category2['name']; ?>" data-nparent_id="<?php echo $parent_id3; ?>" type="button" class="nmod btn btn-success"><i class="fas fa-plus"></i> add</a>
                                </td>
                                </tr>
                                <?php
                                            while ($category3 = $result_category3->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class='mod' href='#categoryModal' data-toggle='modal' data-cat_name="<?php echo $category3['name']; ?>" data-id="<?php echo $category3['id']; ?>" data-parent_id="<?php echo $category3['parent_id']; ?>">
                                            <?php echo "(" . $category3['id'] . ")" . $category3['name']; ?></td>
                                    </tr>

            <?php
                                            }
                                        }
                                    }
                                }
                            }
                        }


            ?>
            <tr>
                <td colspan="3"> <a data-target="#ncategoryModal" data-toggle="modal" data-nparent_id="0" type="button" class="nmod btn btn-success float-left"><i class="fas fa-plus"></i> &nbsp; dodaj<b>KATEGORIJU</b></a>
                </td>
            </tr>
                </tbody>
            </table>


        </div>
    </div>