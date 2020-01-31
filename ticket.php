<?php include 'validsession.php'?>
<?php include 'headeradmin.php';?>
<?php
 	  require_once('backend/lib/db.php');

  	if(isset($_GET["id"])) {
		/* Obtener id del registro */
  		$id = $_GET['id'];
			$id = encrypt_decrypt('d', $id);  // desencriptar id
			get_registro($id, $email,$nombre,$sucursal,$nroticket,$monto,$fecha,$emailregistro,$archivo,$estatus,$observa,$estatusdesc,$pos);
		}
		if(isset($_GET["fe"])) {	$fechadia  = $_GET['fe']; $ganadores = cont_ganadores($fechadia);} else { $fechadia = "";}
    if($estatus == 'GA') { $listpremios = list_premios($id); }
    $estatuscss = strtolower($estatusdesc);
?>
<section id="ticket" class="">
    <ul id="ticketInfo">
      <li class="displayFlex">
        <p>DATOS DEL TICKET</p>
      </li>
      <li class="displayFlex">
        <p>Nombre:</p><span><?php echo $nombre?></span>
      </li>
      <li class="displayFlex">
        <p>Correo:</p><span><?php echo $email?></span>
      </li>
      <li class="displayFlex">
        <p>ID Ticket:</p><span><?php echo $nroticket?></span>
      </li>
      <li class="displayFlex">
        <p>Sucursal:</p><span><?php echo $sucursal?></span>
      </li>
      <li class="displayFlex">
        <p>Monto:</p><span>$<?php echo number_format($monto,2); ?></span>
      </li>
      <li class="displayFlex">
        <p>Fecha y Hora:</p><span><?php echo $fecha?></span>
      </li>
      <li class="displayFlex">
        <p>Estatus:</p><strong class="<?php echo $estatuscss; ?>"><?php echo $estatusdesc?></strong>
      </li>
      <?php if($estatus == 'RE') { /* Si esta rechazado mostrar las observaciones */?>
         <li class="displayFlex"><p>Observaciones:</p><span><?php echo $observa ?></span></li>
      <?php } ?>
      <?php if($estatus == 'GA') { /* Si es Ganador mostrar los premios*/?>
          <li class="displayFlex"><p>Lugar:</p><span><?php echo $pos ?></span></li>
          <!--<li class="displayFlex"><p>Premios:</p><br><span></span></li><li class="displayFlex"><p></p><br><span><?php echo $listpremios ?></span></li>-->
       <?php } ?>
    </ul>
    <div id="ticketHolder">
      <a href="uploads/<?php echo $archivo?>" title="Clic para descargar la imagen" download><img <?php echo $archivo?> src="uploads/<?php echo $archivo?>"></a>
    </div>
    <div id="ticketInterface">
      <p>¿Apruebas este ticket?</p>
      <div class="bts displayFlex">
        <span><p>Si</p><input type="radio" name="accion" id="accion" value="si"></span>
        <span><p>No</p><input type="radio" name="accion" id="accion" value="no"></span>
      </div>
      <p class="alerta" id="msgAccion"></p>
      <p>No se aprobó. ¿Por qué?</p>
      <textarea rows="8" cols="80" id="observa"></textarea>
      <p class="alerta" id="msgObserva"></p>
      <a role="button" class="btns btnEnviar" id="btnEnviar">
        <div class="color trans5"></div>
        <p>Enviar</p>
      </a>
      <a href="#" class="btns btnEnviar btnCancelar" id="">
        <div class="color trans5"></div>
        <p>Regresar a Tabla <span></span></p>
      </a>
    </div>
    <div id="ticketConsulta">
      <p class="alertaOk" id="msgEmail"></p>
      <?php if($estatus == 'GA') {?>
        <a href="#" class="btns btnEnviar" id="btnEmailGanador">
              <div class="color trans5"></div>
              <p>Enviar premios <span></span></p>
        </a>
      <?php  } ?>
      <a href="#" class="btns btnEnviar btnCancelar" id="">
        <div class="color trans5"></div>
        <p>Regresar a Tabla <span></span></p>
      </a>
    </div>
</section>

<script>
	$(document).ready(function(){
		 var id = "<?php echo $id ?>";
 		 var estatus = "<?php echo $estatus ?>";
		 var observa = "<?php echo $observa ?>";
		 var fechadia = "<?php echo $fechadia ?>";
     var ganadores = "<?php echo $ganadores ?>";

		 console.log('ready');

		 if (estatus=='AP') {$("input[name='accion']")[0].checked = true; }
		 if (estatus=='RE') {$("input[name='accion']")[1].checked = true; }
		 if (observa != '') {$("#observa").val(observa);}
     if (ganadores > 0){
       $('#ticketInterface').css('display', 'none'); $('#ticketConsulta').css('display', 'block');
     } else {
       $('#ticketInterface').css('display', 'block');   $('#ticketConsulta').css('display', 'none');
     }

	    $('#btnEnviar').on('click', function (e) {
				var accion = $("input[name='accion']:checked").val();
	      var observa	= $("#observa").val().trim();
		   	var validOk = true;
		   	var msgError= "";
				var estatus = "";

        $('#msgAccion').text(msgError);
        $('#msgObserva').text(msgError);

		   // Validaciones
		   if (accion!="si" && accion!="no") {	msgError = "Debes especificar una acción"; 	$('#msgAccion').text(msgError); validOk = false; }
			 if (accion=="no" && observa=="" && validOk) {	msgError = "Debes indicar porque no se aprueba"; 	$('#msgObserva').text(msgError); validOk = false; }
		   console.log(validOk+' '+msgError+' '+accion+' '+observa);

		   if (validOk) {
						if (accion=="si") { estatus = "AP"; } else { estatus = "RE";}
					 	aprobar_rechazar(id,estatus,observa,fechadia);
	     }
	    });

			$('.btnCancelar').on('click', function (e) {
					window.location.href = "home.php?fe="+fechadia;
			});

      $('#btnEmailGanador').on('click', function (e) {
        var id 		= '<?php echo $id; ?>';
		   	var email = '<?php echo $email; ?>';
        var nombre = '<?php echo $nombre; ?>';
        var nroticket = '<?php echo $nroticket; ?>';
        send_email_ganador(id,email,nombre,nroticket);
      });
	});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
<?php /*include 'footer.php';*/?>
