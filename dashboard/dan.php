<?php include 'inc/init.php';
$datum2 = date("Y-m-d");
if (isset($_GET['dan'])) {
	$datum1 = $_GET['dan'];
	$danas = date_create($datum1);
	date_add($danas, date_interval_create_from_date_string("-1 days"));
	$juce = date_format($danas, "Y-m-d");
	$danas = date_create($datum1);
	date_add($danas, date_interval_create_from_date_string("+1 days"));
	$sutra = date_format($danas, "Y-m-d");
} else {
	header('Location: index.php');
}
if ($datum1 == $datum2) {
	header('Location: index.php');
}

if (!logged_in()) {
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<?php include 'head.php' ?>

<body>

	<?php include 'nav1.php' ?>

	<ul class="nav navbar-nav">
		<li><a href="index.php">Danas</a></li>
		<li><a href="klijenti.php">Klijenti</a></li>
		<li><a href="kalendar.php">Kalendar</a></li>
		<li><a href="beleske.php">Beleške</a></li>

	</ul>


	<?php include 'nav2.php' ?>

	<div class="container-fluid text-center">
		<div class="row content">

			<?php include 'left.php' ?>

			<div class="col-sm-8 text-left">
				<div style="float:left;"><a href="dan.php?dan=<?php echo $juce ?>" class="btn btn-default btn-xs" role="button"><?php echo $juce; ?></a></div>
				<div style="float:right; text-align:right;"><a href="dan.php?dan=<?php echo $sutra ?>" class="btn btn-default btn-xs" role="button"><?php echo $sutra; ?></a></div>

				<h4 align="center"><?php echo $datum1; ?></h4>
				<hr>
				<p>Size:</p>
				<p id="size">Wsize:</p>
				<p id="dsize">Dsize:</p>
				<p>Move, press and release the mouse</p>
				<p id="downlog">Down</p>
				<p id="movelog">Move</p>

				<canvas id="canvas"></canvas>
				<script>
					var width = $(window).width();
					var height = $(window).height();

					var dwidth = $(document).width();
					var dheight = $(document).height();
					$("#size").html("Wsize: " + width + " / " + height);
					$("#dsize").html("Dsize: " + dwidth + " / " + dheight);


					function handleMouseMove(e, height) {
						var canvas = document.getElementById("canvas");
						var ctx = canvas.getContext("2d");

						var canvasOffset = $("#canvas").offset();
						var offsetX = canvasOffset.left;
						var offsetY = canvasOffset.top;
						mouseX = parseInt(e.clientX - offsetX);
						mouseY = parseInt(e.clientY - offsetY + height);
						$("#movelog").html("Move: " + mouseX + " / " + mouseY);

						// Put your mousemove stuff here
					}


					function handleMouseDown(e, height) {
						var canvas = document.getElementById("canvas");
						var ctx = canvas.getContext("2d");

						var canvasOffset = $("#canvas").offset();
						var offsetX = canvasOffset.left;
						var offsetY = canvasOffset.top;
						mouseX = parseInt(e.clientX - offsetX);
						mouseY = parseInt(e.clientY - offsetY + height);
						$("#downlog").html("Down: " + mouseX + " / " + mouseY);

						// Put your mousedown stuff here
					}

					function handleMouseScroll(e, height) {
						var canvas = document.getElementById("canvas");
						var ctx = canvas.getContext("2d");

						var canvasOffset = $("#canvas").offset();
						var offsetX = canvasOffset.left;
						var offsetY = canvasOffset.top;
						mouseX = parseInt(e.clientX - offsetX);
						mouseY = parseInt(e.clientY - offsetY + height);
						$("#movelog").html("Down: " + mouseX + " / " + mouseY);

						// Put your mousedown stuff here
					}




					$("window").scroll(function(e) {
						var height = $(window).scrollTop();
						handleMouseScroll(e, height);
					});

					$("#canvas").mousedown(function(e) {
						var height = $(window).scrollTop();
						handleMouseDown(e, height);
					});
					$("#canvas").mousemove(function(e) {
						var height = $(window).scrollTop();
						handleMouseMove(e, height);
					});
				</script>
			</div>

			<?php include 'right.php' ?>

		</div>

		<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">
							Detalji vožnje
						</h4>
					</div>
					<div class="modal-body">

						<div id="modal-loader" style="display: none; text-align: center;">
							<img src="ajax-loader.gif">
						</div>

						<!-- content will be load here -->
						<div id="dynamic-content"></div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
					</div>

				</div>
			</div>
		</div>

	</div>

	<?php include 'footer.php' ?>



</body>

<?php include 'clock.php' ?>
<script>
	$('.clickable-tr').on('click', function() {
		var myLink = $(this).attr('href');
		window.location.href = myLink;
	});
</script>
<script>
	$(document).ready(function() {

		$(document).on('click', '#voznjaDetail', function(e) {

			e.preventDefault();

			var uid = $(this).data('id'); // it will get id of clicked row

			$('#dynamic-content').html(''); // leave it blank before ajax call
			$('#modal-loader').show(); // load ajax loader

			$.ajax({
					url: 'voznja_detail.php',
					type: 'POST',
					data: 'id=' + uid,
					dataType: 'html'
				})
				.done(function(data) {
					console.log(data);
					$('#dynamic-content').html('');
					$('#dynamic-content').html(data); // load response 
					$('#modal-loader').hide(); // hide ajax loader	
				})
				.fail(function() {
					$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Greska, probajte ponovo...');
					$('#modal-loader').hide();
				});

		});

	});
</script>

</html>