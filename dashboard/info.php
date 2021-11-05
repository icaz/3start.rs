<?php
if (isset($_SESSION['success_message']) && $_SESSION['success_message'] != '') {
    ?>
    <div class="alert alert-success alert-dismissible text-center" id="salert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php echo $_SESSION['success_message']; ?>
    </div>
<?php
  unset($_SESSION['success_message']);
}
if (isset($_SESSION['fail_message']) && $_SESSION['fail_message'] != '') {
    ?>
    <div class="alert alert-danger alert-dismissible text-center" id="falert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php echo $_SESSION['fail_message']; ?>
    </div>
<?php
  unset($_SESSION['fail_message']);
}
if (isset($_SESSION['warning_message']) && $_SESSION['warning_message'] != '') {
    ?>
    <div class="alert alert-warning alert-dismissible text-center" id="walert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php echo $_SESSION['warning_message']; ?>
    </div>
<?php
  unset($_SESSION['warning_message']);
}
?>