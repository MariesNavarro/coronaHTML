<?php include 'headeradmin.php';?>
<?php
	require_once('backend/lib/db.php');

	$list_dias = list_ganadores_dias();	// lista de dias ganadores
	if ($list_dias=="") { $msg = "Sin ganadores"; } else { $msg = "";}
?>

<section id="ganadores">
	<header>
		<h2>Ganadores del Día</h2>
	</header>
	<div id="interface" class="displayFlex">
			<select id="selectGanadoresdia" name="" class="">
				<?php  echo $list_dias; ?>
			</select>
	</div>
	<ul id="winnersList" class="displayFlex">
		<?php  echo $msg; ?>
	</ul>
</section>

<script>
	$(document).ready(function(){
	  	console.log('ready');
			$('body').addClass('blueBody');
			$('footer').addClass('bluePage');

			var fecha 	= $("#selectGanadoresdia").val();
			if (fecha != '0' && fecha != '' && fecha != null){ get_ganadores(fecha);	}

	    $('#selectGanadoresdia').on('change', function (e) {
				  var fecha 	= $("#selectGanadoresdia").val();
					if (fecha != '0'){ get_ganadores(fecha);	} else { $("#winnersList").empty();}
	    });
	});
</script>

<?php include 'footerganadores.php';?>
