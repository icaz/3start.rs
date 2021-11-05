    <!-- Modal_kat1 -->
    <div class="modal fade" id="modal_category" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h6 class="modal-title" id="Label">Dodaj Kategoriju</h6>
                    <button name="body" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-light">
                    <div id="modal-loader" style="display: none; text-align: center;">
                        <img src="ajax-loader.gif">
                    </div>
                    <!-- content will be load here -->
                    <form action="store_cat.php" method="POST">

                        <div id="dynamic-content"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                    <button type="submit" name="add1" value="cat1" class="btn btn-primary">Dodaj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>