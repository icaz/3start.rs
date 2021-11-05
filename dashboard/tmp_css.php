<style>
    @keyframes pulseAlert {
        0% {
            background-color: red;
        }

        50% {
            background-color: green;
        }

        100% {
            background-color: red;
        }
    }

    .pulseAlert-css {
        animation: pulseAlert 1s ease-out;
        animation-iteration-count: infinite;
        color: red;
        /* you need this to specify a color to pulse to */
    }
</style>

<div class="card-footer">
    <button name="btn" value="radno_vreme" type="submit" class="btn btx-lg btn-primary float-right"><i class="fas fa-save"></i> &nbsp; sačuvaj<b>RADNOvreme</b></button>

</div>


if (isset($_GET['cen_id'])) {
$cen_id = $_GET['cen_id'];
} else {
header('Location: provider_profile.php');
}