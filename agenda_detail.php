<?php
include 'inc/init.php';
	$agenda_id = intval($_REQUEST['agenda_id']);
	$hour = intval($_REQUEST['hour']);
	if ($hour < 10) {$hour='0'.$hour;}
	$minuta = intval($_REQUEST['minuta']);
	if ($minuta < 10) {$minuta='0'.$minuta;}
	$datum = ($_REQUEST['datum']);
$datum1=date("Y-m-d");

if (isset($_REQUEST['id'])) {
	$id = intval($_REQUEST['id']);

}

?>

<div align="center">
	
    
<?php 
	echo '<h4 align="center">Zakaži za '.$hour.':'.$minuta.'</h4>';
?>
<div class="form-group">
	<form method="POST" action="unos_agenda.php">
    <div style="text-align:left; line-height:26px;"><strong>Naslov:</strong></div>
        <input name="naslov" type="text" class="form-control" id="naslov" placeholder="Naslov..." autofocus required>
    
    <div style="text-align:left; line-height:26px;"><strong>Trajanje:</strong></div>
        <select name="trajanje" type="text" class="form-control" id="trajanje" autofocus>
            <option value="30">30 min.</option>
            <option value="60" selected>60 min.</option>
            <option value="90">90 min.</option>
            <option value="120">120 min.</option>
        </select>
    <div style="text-align:left; line-height:26px;"><strong>Napomena:</strong></div>
        <textarea name="napomena" class="form-control" rows="3" id="napomena"></textarea>
<br />

        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Unesi</button>


	</form>
</div>







