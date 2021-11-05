    <!-- Modal -->
    <div class="modal fade" id="deleteModal-<?php echo $salon_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h6 class="modal-title" id="Label">Obriši salon <?php echo $salon_name; ?></h6>
                    <button name="body" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-light">
                    <div class="description-block">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle bg-light elevation-2 float-left m-2" src="img/salon_avatar.png" alt="User profile picture">
                        </div>
                    </div>

                    <h5 class="ml-auto">Da li ste sigurni da želite da obrišete salon <?php echo $salon_name; ?></h5>
                </div>

                <div class="modal-footer">



                    <button type="button" class="btn btn-success" data-dismiss="modal">NE</button>
                    <a type="button" href="delete_salon.php?salon_id=<?php echo $salon_id; ?>" class="btn btn-danger">DA</a>
                </div>
            </div>
        </div>
    </div>