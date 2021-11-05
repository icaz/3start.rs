    <!-- Modal -->
    <div class="modal fade" id="add_cat_modal-<?php echo $cat_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h6 class="modal-title" id="Label">Dodaj Kategoriju</h6>
                    <button name="body" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-light">

                    <form action="store_cat.php" method="POST">
                        <div class="form-group form-group-sm">
                            <input name="cat1_name" type="text" class="form-control input-sm" id="comment-name" placeholder="Kategorija 1">
                        </div>
                        <div class="form-group form-group-sm">


                        </div>


                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                    <button type="submit" name="add1" value="cat1" class="btn btn-primary">Dodaj</button>
                    </form>

                </div>
            </div>
        </div>
    </div>