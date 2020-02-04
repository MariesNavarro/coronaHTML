<?php include 'header.php';?>

<?php
	require_once('backend/lib/db.php');

	if(isset($_GET["id"])) {
	/* Obtener id del registro */
		$id   = $_GET['id'];
		$id = encrypt_decrypt('d', $id);  // desencriptar id
		get_registro($id, $email,$nombre,$sucursal,$nroticket,$monto,$fecha,$emailregistro,$archivo,$estatus,$observa,$estatusdesc,$pos);
		/*
		if ($emailregistro=='N') {  // si no se ha enviado el email de registro
			send_email_registro($id,$email,$nombre,$sucursal,$nroticket,$monto,$fecha);
			update_registro_emailregistro($id);
		}*/
  }

	if(isset($_GET["ms"])) {
		  /* Obtener ms */
			$ms   = $_GET['ms'];
			switch ($ms) {
				case 0:  /* error */	$msg = "Lo sentimos <b>algo falló</b> y tu ticket no fue enviado correctamente.";	break;
				case -1:  /* ticket ya existe */	$msg = "Este ticket ya fue registrado. Lo sentimos los tickets sólo pueden ser registrados una vez.";	break;
				case -2:  /* fecha no coincide con la de hoy */	$msg = "La fecha del ticket debe coincidir con la fecha de hoy.";	break;
				default:	$msg  = "Gracias <b>".$nombre."</b>, tu <b>ticket fue enviado</b>, pronto te llegará una confirmación al correo que registraste. Recuerda revisar tu carpeta de correos no deseados (spam)";
			}
	} else {
		  $ms  = 1;
			$msg  = "Gracias  <b>".$nombre."</b>, tu <b>ticket fue enviado</b>, pronto te llegará una confirmación al correo que registraste. Recuerda revisar tu carpeta de correos no deseados (spam)";
	}
//	echo $ms.' '.$msg;
?>

<section id="mensaje" class="displayFlex">
		<div id="iconWrap">
			<div class="circle"></div>
			<div id="icon" class="enviado"></div>
		</div>
		<p></p>
		<span></span>
		<div id="respuesta">
			<div id="r1" class="displayNone">
				<p>Para saber más de nuestros productos visita:</p>
				<a href="https://coronamexico.com" target="_blank" class="trans5">www.coronamexico.com</a>
			</div>
			<div id="r2" class="displayNone">
				<a href="registro.php" class="btns btnIntento">
					<div class="color trans5"></div>
					<p>Volver a Intentar</p>
				</a>
			</div>
		</div>
</section>

<script type="text/javascript">
	$(document).ready(function(){
		console.log('ready');
		$('footer').addClass('footMsj');

		var msg = "<?php echo $msg ?>";
		var ms = "<?php echo $ms ?>";
		var emailregistro = "<?php echo $emailregistro ?>";

		if (emailregistro=='N') {  // Mandar email con el registro, solo la primera vez
			var id 		= '<?php echo $id; ?>';
			var email = '<?php echo $email; ?>';
			var nombre = '<?php echo $nombre; ?>';
			var sucursal = '<?php echo $sucursal; ?>';
			var nroticket = '<?php echo $nroticket; ?>';
			var monto = '<?php echo $monto; ?>';
			var fecha = '<?php echo $fecha; ?>';
			send_email_registro(id,email,nombre,sucursal,nroticket,monto,fecha,ms,msg);
		} else {
			chooseMsg(ms,msg); //Enviado
		}
	});
</script>

<?php include 'footer.php';?>
