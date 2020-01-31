<?php
  require_once('backend/lib/db.php');

  if(isset($_POST["acc"])) {

  	 /* Obtener acción */
 	 $acc   = $_POST['acc'];

	 switch ($acc) {
		case 1:  /* registro ticket */
	      /* Obtener parametros */
		    $suc   	= $_POST['suc'];
		    $monto  = $_POST['mon'];
		    $nro   	= $_POST['nro'];
		    $fecha  = $_POST['fec'];
		    $nombre = $_POST['nom'];
		    $email  = $_POST['ema'];
		    $telef  = $_POST['tel'];
		    $cp  	  = $_POST['cp'];
	      echo insert_registro($suc,$monto,$nro,$fecha,$nombre,$email,$telef,$cp);
		    break;
    case 2:  /* get ganadores dia x */
        $fecha  = $_POST['fec'];
        echo list_ganadores($fecha);
        break;
    case 3:  /* get registros dia x */
        $fecha  = $_POST['fec'];
        echo list_registros($fecha);
        break;
    case 4:  /* aprobar o rechazar ticket */
        $id       = $_POST['id'];
        $estatus  = $_POST['est'];
        $observa  = $_POST['obs'];
        echo aprobar_rechazar($id, $estatus, $observa);
        break;
    case 5:  /* enviar ganadores */
        $fecha  = $_POST['fec'];
        echo enviar_ganadores($fecha);
        break;
    case 6; /* enviar email con el registro  */
        $id       = $_POST['id'];
        $email    = $_POST['ema'];
        $nombre   = $_POST['nom'];
        $sucursal = $_POST['suc'];
        $nroticket= $_POST['nro'];
        $monto    = $_POST['mon'];
        $fecha    = $_POST['fec'];
        echo send_email_registro($id,$email,$nombre,$sucursal,$nroticket,$monto,$fecha);
        break;
    case 7; /* enviar email con los premios de un ganador  */
        $id       = $_POST['id'];
        $email    = $_POST['ema'];
        $nombre   = $_POST['nom'];
        $nro_ticket= $_POST['nro'];
        echo send_email_ganador($id,$email,$nombre,$nro_ticket);
        break;
    case 8:  /* login */
        $user  = $_POST['usr'];
        $pass  = $_POST['pwd'];
        echo login($user,$pass);
        break;
    case 9:  /* logout */
        echo logout();
        break;
	  default:
		    echo "Parámetro incorrecto";
        break;
	 }
  }
?>
