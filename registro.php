<?php include 'header.php';?>
<?php
	require_once('backend/lib/db.php');

	log_cont(); // contador de veces click al botón de registrar
	$sucursales = list_sucursales();	// lista de sucursales
?>

<section id="registro">
	<header>
		<h2><span>Por favor ingresa los siguientes datos:</span></h2>
		<p>Registro Válido sólo día de la compra*</p>
		<span></span>
	</header>
	<div id="form" class="displayFlex">
		<div class="leftWr" class="displayFlex">
			<!-- Seleccion sucursal -->
			<div class="qstWr">
					<label for="sucursal">Sucursal</label>
					<input list="listSucursal" id="selectSucursal" placeholder="Selecciona la Sucursal de Compra">
						<datalist id="listSucursal" name="sucursal" class="">
							<?php  echo $sucursales; ?>
						</datalist>
					<p class="alerta" id="msgSucursal"></p>
				</div>
				<!-- Ingresa monto -->
				<div class="qstWr">
					<label for="monto">Monto</label>
					<input type="number" id="monto" name="monto" placeholder="Ingresa únicamente de Compras Corona" required>
					<p class="alerta" id="msgMonto"></p>
				</div>
				<!-- Ingresa ticket ID -->
				<div class="qstWr">
					<label for="ticketid">Ticket ID</label>
					<input type="text" name="nro" id="nro" placeholder="Ingresa el ID de Ticket ó Factura" required>
					<p class="alerta" id="msgNro"></p>
				</div>
				<!-- Ingresa fecha y hora -->
				<div class="qstWr">
					<label for="fechahora">Fecha y Hora de Compra*</label>
					<div class="qstWrDate displayFlex">
						<input type="date" data-date="" data-date-format="DD-MM-YYYY" value="<?= date("Y-m-d"); ?>" name="date" id="fecha" style="width:50%;" required>
						<input type="time" name="time"  id="hora" style="width:50%;">
					</div>
					<p class="alerta" id="msgFecha"></p>
				</div>
				<!-- Correo -->
				<div class="qstWr">
					<label for="correo">Tu Correo</label>
					<input type="email"  name="email" id="email" placeholder="Ingresa un Correo" required>
					<p class="alerta" id="msgEmail"></p>
				</div>
		</div>
		<div class="rightWr" class="displayFlex">
			<!-- Nombre -->
			<div class="qstWr">
				<label for="nombre">Tu Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Ingresa Nombre" required>
				<p class="alerta" id="msgNombre"></p>
			</div>
			<!-- Apellidos -->
			<div class="qstWr">
				<label for="nombre">Tu Apellido paterno</label>
				<input type="text" name="apellidopaterno" id="apellidopaterno" placeholder="Ingresa Apellido paterno" required>
				<p class="alerta" id="msgApellidopaterno"></p>
			</div>
			<!-- Apellidos -->
			<div class="qstWr">
				<label for="nombre">Tu Apellido materno</label>
				<input type="text" name="apellidomaterno" id="apellidomaterno" placeholder="Ingresa Apellido materno" required>
				<p class="alerta" id="msgApellidomaterno"></p>
			</div>
			<!-- Teléfono -->
			<div class="qstWr">
				<label for="telefono">Tu Teléfono</label>
				<input type="tel" name="telefono" id="telef" placeholder="(55)-5555555" required>
				<p class="alerta" id="msgTelef"></p>
			</div>
			<!-- CP -->
			<div class="qstWr">
				<label for="cp">Tu Código Postal</label>
				<input type="number" name="cp" id="cp" maxlength = "5" min = "1" max = "99999" placeholder="99999" required>
				<p class="alerta" id="msgCP"></p>
			</div>
		</div>
	</div>
	<div id="extraForm" class="displayFlex">
		<div class="leftWr">
			<p class="refTicketTx">¿No encuentras algún dato en el <b>ticket</b><br> ó <b>factura</b>? <a href="anexos/ticket_referencia.pdf" target='_blank'>Ver Referencias</a></p>
		</div>
		<div class="rightWr displayFlex">
			<div class="btnPart2 displayFlex" style="margin-top: 20px;">
				<p>Sube tu <b>Ticket ó Factura</b></p>
				<label class="btns btnSube" for="ticketFile" onclick="loadFileName(this)">
					<div class="color trans5"></div>
					<p>Sube <span class="icon camIc"></span></p>
				</label>
				<input type="file" class="btnSubeOculto" name="ticketFile" id="ticketFile" accept="image/*">
				<p class="alerta" id="msgFile"></p>
			</div>
		</div>
		<div class="btnPart2 displayFlex">
			<p>Dale <b>Like</b> a Corona México</p><br>
			<div id="fb-like" class="fb-like" data-href="https://www.facebook.com/CoronaInspiraMX" data-width="" data-layout="button" data-action="like" data-size="large" data-share="false"></div>
			<!--
			<a role="button" class="btns btnFace">
				<div class="color trans5"></div>
				<p>Corona México <span class="icon likeIc"></span></p>
			</a>
			-->
			<p class="alerta" id="msgFB"></p>
		</div>
	</div>

	<div id="enviar">
		<div class="rightWr">
				<div class="displayFlex">
					<input class="checkSend" type="checkbox" name="terminos" value="terminos" id="terminos">
					<p>Acepto <a href="legales/Terminos_Condiciones_Promocion.pdf" target="_blank">Términos y Condiciones</a></p>
				</div>
				<p class="alerta" id="msgTerminos"></p>
				<a href="#" role="button" class="btns btnEnviar" id="btnEnviar">
					<div class="color trans5"></div>
					<p>Enviar</p>
				</a>
				<!--
				<div class="displayFlex">
					<p style="color: red;display: none; font-weight: bold;"  id="msgError"></p>
				</div>
			-->
		</div>
	</div>
</section>

<script>
	$(document).ready(function(event){
		  event.preventDefault();
	  	console.log('ready');
			$('body').addClass('bodyRegistro');

	    $('#btnEnviar').on('click', function (e) {
	      var sucursal 				= $("#selectSucursal").val();
	      var monto 					= $("#monto").val();
	      var nro 						= $("#nro").val();
	      var fecha 					= $("#fecha").val();
				var hora 		  			= $("#hora").val();
		   	var nombre 					= $("#nombre").val();
				var apellidopaterno = $("#apellidopaterno").val();
				var apellidomaterno = $("#apellidomaterno").val();
		   	var email 					= $("#email").val();
		   	var telef 					= $("#telef").val();
		   	var cp 							= $("#cp").val();
		   	var validOk   			= true;
		   	var msgError  			= "";

				$('#msgSucursal').text(msgError);
				$('#msgMonto').text(msgError);
				$('#msgNro').text(msgError);
				$('#msgFecha').text(msgError);
				$('#msgNombre').text(msgError);
				$('#msgApellidopaterno').text(msgError);
				$('#msgApellidomaterno').text(msgError);
				$('#msgEmail').text(msgError);
				$('#msgTelef').text(msgError);
				$('#msgCP').text(msgError);
				$('#msgFile').text(msgError);
				$('#msgTerminos').text(msgError);

		   // Validaciones
		   if (sucursal=="") {	msgError = "Debe especificar una sucursal"; $('#msgSucursal').text(msgError); validOk = false; }
		   if (monto=="" || monto<1900  ) { 	msgError = "Debe ingresar un monto válido del ticket (mayor o igual a $1900)";	$('#msgMonto').text(msgError); validOk = false; }
	  	 if (nro=="") { 	msgError = "Debes ingresar el Nro. del ticket";	$('#msgNro').text(msgError); validOk = false; }
			 if (nro.length > 25) { 	msgError = "Debes ingresar un Nro. del ticket menor a 25 dígitos";	$('#msgNro').text(msgError); validOk = false; }
	  	 if (fecha=="")  { msgError = "Debes ingresar la fecha del ticket o factura"; $('#msgFecha').text(msgError); validOk = false;  }
			 if (hora=="")  { msgError = "Debes ingresar la hora del ticket o factura"; $('#msgFecha').text(msgError); validOk = false;  }
	  	 if (nombre=="")  { msgError = "Debes ingresar tu nombre"; $('#msgNombre').text(msgError);validOk = false; }
			 if (apellidopaterno=="")  { msgError = "Debes ingresar tu apellido paterno"; $('#msgApellidopaterno').text(msgError);validOk = false; }
			 if (apellidomaterno=="")  { msgError = "Debes ingresar tu apellido materno"; $('#msgApellidomaterno').text(msgError);validOk = false; }
	  	 if (email=="")  { msgError = "Debes ingresar tu correo"; $('#msgEmail').text(msgError);validOk = false; }
		   if (!emailIsValid (email) ) { msgError = "Debes proporcionar un correo válido"; $('#msgEmail').text(msgError);validOk = false; }
			 if (telef=="")  { msgError = "Debes ingresar tu teléfono"; $('#msgTelef').text(msgError);validOk = false; }
			 if (cp=="") { msgError = "Debes ingresar tu código postal"; $('#msgCP').text(msgError);validOk = false; }
			 if (!cpIsValid (cp) || cp.length > 5 || cp.length < 5) { msgError = "Debes ingresar un código postal válido (5 dígitos)"; $('#msgCP').text(msgError);validOk = false; }
		   if (($('#ticketFile')[0].files.length<=0) ) { msgError = "Debes seleccionar un archivo con la imagen del ticket"; $('#msgFile').text(msgError); validOk = false;}
	  	 if (!$('#terminos').prop('checked') ) { msgError = "Debes seleccionar acepto término y condiciones"; $('#msgTerminos').text(msgError); validOk = false;  }
		   console.log(validOk+' '+msgError);

		   if (validOk) {	registrar(sucursal,monto,nro,fecha+' '+hora,nombre,apellidopaterno,apellidomaterno,email,telef,cp); }

	    });
	});
</script>

<?php /*include 'footer.php'; */?>
