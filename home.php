<?php include 'validsession.php'?>
<?php include 'headeradmin.php';?>
<?php
	require_once('backend/lib/db.php');
	if(isset($_GET["fe"])) {	$fecha  = $_GET['fe']; } else { $fecha = "";}
	$list_dias = list_registros_dias($fecha);	// lista de dias registros

	// contadores
	cont_registros($registros,$ganadores,$rechezados);
	cont_premiosdisponibles($cinepolis,$netflix,$spotify);
?>

 <a href="#" class="logout">Cerrar sesión</a>

  <section id="tabla" class="displayFlex">

		<div id="sendWinWr" class="displayFlex">
			<p>Total de Tickets Registros <strong class="aprobado"><?php echo $registros?></strong> Ganadores <strong class="ganador"><?php echo $ganadores?></strong> Rechazados <strong class="rechazado"><?php echo $rechezados?></strong></p>
				<!--<p>Total de Premios disponibles Cinépolis <strong class="pendiente"><?php echo $cinepolis?></strong> Spotify <strong class="aprobado"><?php echo $spotify?></strong> Nextflix <strong class="rechazado"><?php echo $netflix?></strong></p>-->
		</div>

		<p>Tickets del día</p>
		<select class="" name="" id="selectRegistrosdia">
				<?php  echo $list_dias; ?>
		</select>

      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>ID</th>
						<th>Sucursal</th>
            <th>Monto</th>
						<th>Fecha/Hora Ticket</th>
						<th>Fecha/Hora Registro</th>
						<th>Ticket</th>
            <th>Estatus</th>
            <th>Ver Ticket</th>
          </tr>
        </thead>
        <tbody id="lstRegistrosdia">
        <tbody>
      </table>
    </section>

    <!--
    <p id="tableOnMob">Scrollea a izquierda para ver todos los campos <span></span></p>
    <div id="verMasTabla" class="displayFlex">
      <p>Ver Todos Los Tickets</p>
      <a role="button" class="trans5"></a>
    </div>
    -->
    <div id="sendWinWr" class="displayFlex">
      <p>Ya has aprobado <strong id="contap" class="aprobado"></strong> ticket(s), rechazados <strong id="contre" class="rechazado"></strong> ticket(s), pendientes <strong id="contpe" class="pendiente"></strong> ticket(s), ganadores <strong id="contga" class="ganador"></strong> ticket(s)</p>
      <strong id="msg" class="alertaOk"></strong>
      <!--¿Quieres enviar a los ganadores del día? </p>-->
      <a role="button" class="btns btnEnviar" id="btnEnviar" style="width:270px;">
        <div class="color trans5"></div>
        <p>Enviar ganadores</p>
      </a>
    </div>
    <div id="popAprobados" class="displayNone">
      <div>
        <p>¿Estás seguro? Esta acción <br> enviará los ganadores del día.</p>
        <div class="displayFlex">
          <a role="button" onclick="enviarganadores()">Enviar</a>
          <a role="button" onclick="showPop('hide')">Cancelar</a>
        </div>
      </div>
    </div>

		<div id="popAprobadosEnviados" class="displayNone">
			<div>
				<p id="msgAprobadosEnviados"></p>
				<div class="displayFlex">
					<a role="button" onclick="recargarRegistros();">cerrar</a>
				</div>
			</div>
		</div>

<script type="text/javascript">
	$(document).ready(function(){
	  	console.log('ready');
			/*
 			var cinepolis = "<?php echo $cinepolis ?>";
			var spotify 	= "<?php echo $spotify ?>";
			var netflix 	= "<?php echo $netflix ?>";
			*/

			var fecha 	= $("#selectRegistrosdia").val();
			$('#btnEnviar').css('display', 'none');
			if (fecha != '0'){ get_registros(fecha);	} else { $("#lstRegistrosdia").empty();}

	    $('#selectRegistrosdia').on('change', function (e) {
				  var fecha 	= $("#selectRegistrosdia").val();
					if (fecha != '0'){ get_registros(fecha);	} else { $("#lstRegistrosdia").empty();}
	    });

			$('#btnEnviar').on('click', function (e) {
				  showPop("show");
			});

			$('.logout').on('click', function (e) {
					logout();
			});

      //showPop("show"); //mostrar pop
	});

  function showPop(c){
    var wr = document.getElementById("popAprobados");
    if(c == "show"){ wr.setAttribute("class", "displayFlex"); }
    else { wr.setAttribute("class", "displayNone"); }
  }

	function showPopEnviados(c){
		var wr = document.getElementById("popAprobadosEnviados");
		if(c == "show"){ wr.setAttribute("class", "displayFlex"); }
		else { wr.setAttribute("class", "displayNone"); }
	}

	function enviarganadores() {
		var fecha 	= $("#selectRegistrosdia").val();
		enviar_ganadores(fecha);
	}

	function recargarRegistros () {
		showPopEnviados('hide');
		var fecha 	= $("#selectRegistrosdia").val();
		$('#btnEnviar').css('display', 'none');
		if (fecha != '0'){ get_registros(fecha);	} else { $("#lstRegistrosdia").empty();}
	}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
<?php /*include 'footer.php'; */ ?>
