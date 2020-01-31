<?php
session_start();
date_default_timezone_set('America/Mexico_City');

require_once('conexion.php');
require_once('funciones.php');
require_once('log.php');

/* Listado de sucursales */
function list_sucursales(){
  $reg=0;
  /*  $salida='<option class="" value="0">(Selecciona la Sucursal de Compra)</option>';*/
  $link     = connect();
  $consulta ="SELECT id,nombre FROM coro_sucursales WHERE activo = 'S' ORDER BY nombre";

  if ($resultado = mysqli_query($link, $consulta)) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
         /*$salida=$salida.'<option class="" value="'.$fila["id"].'">'.$fila["nombre"].'</option>';*/
         $salida=$salida.'<option class="" value="'.$fila["nombre"].'">';
    }
    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
   }

  Close($link);
  return $salida;
}

function get_sucursal_id($nombre){
  $reg=0;

  $link     = connect();
  $consulta ="SELECT id FROM coro_sucursales WHERE nombre = '$nombre' ORDER BY codigo";

  if ($resultado = mysqli_query($link, $consulta)) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
         /*$salida=$salida.'<option class="" value="'.$fila["id"].'">'.$fila["nombre"].'</option>';*/
         $salida=$fila["id"];
    }
    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
   }

  Close($link);
  return $salida;
}

/* Listado de días de ganadores */
function list_ganadores_dias(){
  $reg=0;
  //$salida='<option class="" value="0">(Selecciona)</option>';
  $link=connect();
  $consulta ="SELECT distinct DATE_FORMAT(fecha_ticket, '%d/%m/%Y') fecha
              FROM coro_registros
             WHERE estatus = 'GA'
          ORDER BY DATE_FORMAT(fecha_ticket, '%d/%m/%Y') desc";

  if ($resultado = mysqli_query($link, $consulta)) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
         $salida=$salida.'<option class="" value="'.$fila["fecha"].'">'.$fila["fecha"].'</option>';
    }
    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
   }

  Close($link);
  return $salida;
}

/* Listado de días de registros */
function list_registros_dias($fecha){
  $reg      = 0;
  //$salida   = '<option class="" value="0">(Selecciona)</option>';
  $link     = connect();
  $consulta ="SELECT distinct DATE_FORMAT(fecha_ticket, '%d/%m/%Y') fecha
              FROM coro_registros
          ORDER BY DATE_FORMAT(fecha_ticket, '%d/%m/%Y') desc";

  if ($resultado = mysqli_query($link, $consulta)) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
         if ($fila["fecha"] == $fecha) {
           $salida=$salida.'<option class="" value="'.$fila["fecha"].'" selected>'.$fila["fecha"].'</option>';
         } else {
           $salida=$salida.'<option class="" value="'.$fila["fecha"].'">'.$fila["fecha"].'</option>';
         }
    }
    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
   }

  Close($link);
  return $salida;
}

/* Listado de ganadores de un día X */
function list_ganadores($fecha){
  $reg      = 0;
  $salida   = '';
  $link     = connect();
  $consulta = "SELECT nro_ticket, monto_ticket, posicion, DATE_FORMAT(fecha_ticket, '%d/%m/%Y') fecha, DATE_FORMAT(fecha_ticket, '%H:%i') hora
              FROM coro_registros
             WHERE estatus = 'GA' AND DATE_FORMAT(fecha_ticket, '%d/%m/%Y') = '".$fecha."'
          ORDER BY posicion asc";

  if ($resultado = mysqli_query($link, $consulta)) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
         $pos = $fila["posicion"];
         $posstr = "";
         switch ($pos) {
           case 1: $posstr = "Primer lugar";  break;
           case 2: $posstr = "Segundo lugar";  break;
           case 3: $posstr = "Tercer lugar";  break;
           default: $posstr = "Lugar ".$pos;  break;
         }
         $salida=$salida.'<li><h3>Lugar '.$posstr.'</h3><h4>#'.$fila["nro_ticket"].'</h4><p>$'.number_format($fila["monto_ticket"],2).'</p></li>';
    }
    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
   }

  Close($link);
  return $salida;
}

/* cont ganadores de un día X */
function cont_ganadores($fecha){
  $salida   = 0;
  $link     = connect();
  $consulta = "SELECT count('x') cont FROM coro_registros WHERE estatus = 'GA' AND DATE_FORMAT(fecha_ticket, '%d/%m/%Y') = '".$fecha."'";

  if ($resultado = mysqli_query($link, $consulta)) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
         $salida=$fila["cont"];
    }
    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
   }

  Close($link);
  return $salida;
}

/* Listado de registros de un día X */
function list_registros($fecha){
  $reg      = 0;
  $pos      = 1;
  $salida   = '';
  $link     = connect();
  $contap   = 0;
  $contre   = 0;
  $contpe   = 0;
  $contga   = 0;
  $consulta ="SELECT id,nombre,nro_ticket, monto_ticket, estatus
              FROM coro_registros
             WHERE DATE_FORMAT(fecha_ticket, '%d/%m/%Y') = '".$fecha."'
          ORDER BY monto_ticket desc";

  if ($resultado = mysqli_query($link, $consulta)) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        // encriptar id
        $id = encrypt_decrypt('e', $fila["id"]);
        $estatus = $fila["estatus"];

        switch ($estatus) {
          case 'PE': $estatusStr = "Pendiente"; $estatusClass = "pendiente"; break;
          case 'AP': $estatusStr = "Aprobado";  $estatusClass = "aprobado";  break;
          case 'RE': $estatusStr = "Rechazado"; $estatusClass = "rechazado"; break;
          case 'GA': $estatusStr = "Ganador";   $estatusClass = "ganador"; break;
          default: $estatusStr = $estatus;  break;
        }

        $salida=$salida.'<tr><td class="position">'.$pos.'</td><td class="name">'.$fila["nombre"].'</td><td class="id">'.$fila["nro_ticket"].'</td><td class="total">$'.number_format($fila["monto_ticket"],2).'</td><td class="status '.$estatusClass.'">'.$estatusStr.'</td><td class="action"><a href="ticket.php?id='.$id.'&fe='.$fecha.'" title="Revisar"></a></td></tr>';
        if ($fila["estatus"]=='AP') {$contap++;}
        if ($fila["estatus"]=='RE') {$contre++;}
        if ($fila["estatus"]=='PE') {$contpe++;}
        if ($fila["estatus"]=='GA') {$contga++;}
        $pos++;
    }
    $salida=$salida.'<input type="hidden" id="contaph" name="contap" value="'.$contap.'">';
    $salida=$salida.'<input type="hidden" id="contreh" name="contre" value="'.$contre.'">';
    $salida=$salida.'<input type="hidden" id="contpeh" name="contpe" value="'.$contpe.'">';
    $salida=$salida.'<input type="hidden" id="contgah" name="contga" value="'.$contga.'">';

    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
   }

  Close($link);
  return $salida;
}

/* Listado de premios de un registro */
function list_premios($id){
  $reg      = 0;
  $salida   = '';
  $link     = connect();
  $consulta ="SELECT b.tipo, b.descripcion, b.codigo, b.monto, b.vigencia
              FROM coro_ganadores a
              LEFT JOIN coro_premios b ON a.id_premio = b.id
              WHERE a.id_registro = ".$id;

  if ($resultado = mysqli_query($link, $consulta)) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
         $salida=$salida.'<span>'.$fila["descripcion"].' por $'.$fila["monto"].'<br> código <strong>'.$fila["codigo"].'</strong><br> vigencia hasta '.$fila["vigencia"].' </span><br><br><hr width=400>';
    }
    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
   }

  Close($link);
  return $salida;
}

/* Listado de premios de un registro */
function list_premios_email($id,&$tipo){
  $reg      = 0;
  $salida   = '';
  $link     = connect();
  $consulta ="SELECT b.tipo, b.descripcion, b.codigo, b.monto, b.vigencia
              FROM coro_ganadores a
              LEFT JOIN coro_premios b ON a.id_premio = b.id
              WHERE a.id_registro = ".$id;

  if ($resultado = mysqli_query($link, $consulta)) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
  //       $salida=$salida.'<span>'.$fila["descripcion"].' por $'.$fila["monto"].' código '.$fila["codigo"].' vigencia hasta '.$fila["vigencia"].' </span><br>';

         $salida=$salida.'
            <div style="color:#3b5998;font-family:Verdana, Geneva, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
              <div style="font-size: 14px; line-height: 1.2; font-family: Verdana, Geneva, sans-serif; color: #3b5998; mso-line-height-alt: 17px;">
                <p style="font-size: 15px; line-height: 1.2; word-break: break-word; text-align: center; font-family: Verdana, Geneva, sans-serif; mso-line-height-alt: 18px; margin: 0;"><span style="font-size: 15px;">&nbsp;<strong>'.$fila["descripcion"].'</strong></span></p>
                <p style="font-size: 15px; line-height: 1.2; word-break: break-word; text-align: center; font-family: Verdana, Geneva, sans-serif; mso-line-height-alt: 18px; margin: 0;"><span style="font-size: 15px;">por&nbsp;<strong>$'.$fila["monto"].'</strong></span></p><br>
                <p style="font-size: 15px; line-height: 1.2; word-break: break-word; text-align: center; font-family: Verdana, Geneva, sans-serif; mso-line-height-alt: 18px; margin: 0;"><span style="font-size: 18px;">Código&nbsp;<strong style="color:#FF8C00;">'.$fila["codigo"].'</strong></span></p><br>
                <p style="font-size: 15px; line-height: 1.2; word-break: break-word; text-align: center; font-family: Verdana, Geneva, sans-serif; mso-line-height-alt: 18px; margin: 0;"><span style="font-size: 12px;">Vigencia al&nbsp;<strong>'.$fila["vigencia"].'</strong></span></p>
              </div>
            </div>
            <hr width=400>
            ';
            $tipo = $fila["tipo"];
    }
    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
   }

  Close($link);
  return $salida;
}


/* Insert registro y envio de email */
function insert_registro($sucnom,$monto,$nro,$fechastr,$nombre,$email,$telef,$cp ) {
  	$result 	  = 0;
  	$hoy 		    = date("Y-m-d H:i:s");
  	$hoydia 	  = date("Y-m-d");
  	$fecha      = strtotime($fechastr);
  	$fechahora  = date('Y-m-d H:i', $fecha);
  	$fechadia   = date('Y-m-d', $fecha);

  	/* Ontener la IP */
  	$ip = '';
  	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  $ip = $_SERVER['HTTP_CLIENT_IP']; }
  	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }
  	else {  $ip = $_SERVER['REMOTE_ADDR']; }

  	$salida = get_country_api($country_code,$ip,$country_region,$codpais);
  	log_cont_registro();  // contador de veces al boton click de enviar ticket

  	$link=connect();

  	/* Verificar que el ticket no haya sido registrado */
  	$query = "SELECT 'x' FROM coro_registros WHERE nro_ticket = '$nro'";

  	if ($resultado = mysqli_query($link, $query)) {
  		if (mysqli_num_rows($resultado)>0) {
  			$result = -1;
  			$error='Nuevo registro error nro. tikect ya existe: '.$nro;
	      log_write($error);
  		}
  	}

  	/* Validar que la fecha del ticket sea la del día */
  	if ($hoydia != $fechadia ) {
		    $result = -2;
		    $error='Nuevo registro error fecha ticket: '.$fechadia.' no coincide con la fecha de hoy '.$hoydia;
        log_write($error);
  	}

  	if ($result >=0) {
     $suc = get_sucursal_id($sucnom); // Obtener el id de la sucursal a partir del nombre

		 $query ="INSERT INTO coro_registros";
		 $query .="(nombre, email, telefono, cp, idsuc_ticket, nro_ticket, monto_ticket, fecha_ticket, archivo_ticket, like_fb, observaciones, estatus, fecha_estatus, ip, huella_digital, pais, estado, usuario, fecha_insert, fecha_update)";
		 $query .=" VALUES ('$nombre','$email','$telef','$cp',$suc,'$nro',$monto,'$fechahora',NULL,NULL,'','PE','$hoy','$ip',NULL,'$codpais','$country_region','usuariofinal','$hoy','$hoy')";

		 if (mysqli_query($link, $query)) {
		      $result=mysqli_insert_id($link);
		      log_write('Nuevo registro ok id '.$result);

          // envio de email
          //  send_email_registro($result,$email,$nombre,$sucnom,$nro,$monto,$fechahora);

		      // encriptar el id
		      $result = encrypt_decrypt('e', $result);
		 }
		 else {
		     $error=$query;
		     log_write('Nuevo registro error query'.$error);
		 }
  	 mysqli_commit($link);
   	}
   	Close($link);
    log_write_sql($query);
 	  return $result;
}

/* Update registro con el archivo */
function update_registro_file($id,$file) {
  $link=connect();

  if ($id > 0 ) {
  	$query ="UPDATE coro_registros";
  	$query .=" SET archivo_ticket = '$file'";
  	$query .=" WHERE id = $id";

  	if (!mysqli_query($link, $query)) {
     	 $error=$query;
     	 log_write('Update registro error id '.$id.' query: '.$error);
   	} else {
   		log_write('Update registro ok file id '.$id);
   	}

   	mysqli_commit($link);
    log_write_sql($query);
   	Close($link);
  }
}

/* Update registro email enviado */
function update_registro_emailregistro($id) {
  $link=connect();

  if ($id > 0 ) {
  	$query ="UPDATE coro_registros";
  	$query .=" SET email_registro = 'S'";
  	$query .=" WHERE id = $id";

  	if (!mysqli_query($link, $query)) {
     	 $error=$query;
     	 log_write('Update registro emailregistro error id '.$id.' query: '.$error);
   	} else {
   		 log_write('Update registro ok emailregistro id '.$id);
   	}
   	mysqli_commit($link);
    log_write_sql($query);
   	Close($link);
  }
}

/* Update registro email ganador */
function update_registro_emailganador($id) {
  $link=connect();

  if ($id > 0 ) {
  	$query ="UPDATE coro_registros";
  	$query .=" SET email_ganador = 'S'";
  	$query .=" WHERE id = $id";

  	if (!mysqli_query($link, $query)) {
     	 $error=$query;
     	 log_write('Update registro emailganador error id '.$id.' query: '.$error);
   	} else {
   		 log_write('Update registro ok emailganador id '.$id);
   	}
   	mysqli_commit($link);
    log_write_sql($query);
   	Close($link);
  }
}

/* Aprobar o rechazar registro */
function aprobar_rechazar($id, $estatus, $observa) {
  $result 	  = 0;
  $hoy 		    = date("Y-m-d H:i:s");
  $usuario    = $_SESSION['user'];

  $link=connect();

  if ($id > 0 ) {
    if ($estatus == 'AP') { $observa = '';}
  	$query ="UPDATE coro_registros";
  	$query .=" SET estatus = '$estatus',observaciones = '$observa', fecha_estatus = '$hoy', usuario = '$usuario'";
  	$query .=" WHERE id = $id";

  	if (!mysqli_query($link, $query)) {
     	 $error=$query;
       log_write('Aprobar Rechazar error id '.$id.' '.$estatus.' '.$observa.' query: '.$error);
   	}  else {
   		 log_write('Aprobar Rechazar ok id '.$id.' '.$estatus.' '.$observa);
   	}
   	mysqli_commit($link);
    log_write_sql($query);
   	Close($link);
  }
}

function get_estatus_desc ($estatus) {
  $result = "";
  switch ($estatus) {
   case 'PE':  $result = 'Pendiente'; break;
   case 'AP':  $result = 'Aprobado'; break;
   case 'RE':  $result = 'Rechazado'; break;
   case 'GA':  $result = 'Ganador'; break;
   default:
       $result = "Sin estatus";
  }
  return  $result;
}

/* Obtener detalle de un registro X */
function get_registro($id, &$email,&$nombre,&$sucursal,&$nroticket,&$monto,&$fecha,&$emailregistro,&$archivo,&$estatus,&$observa,&$estatusdesc,&$pos) {
  	$result 	= 0;

  	$link=connect();

  	/* Buscar registro */
  	$query = "SELECT a.*, b.nombre sucursal FROM coro_registros a LEFT JOIN coro_sucursales b ON a.idsuc_ticket = b.id WHERE a.id=$id";

  	if ($resultado = mysqli_query($link, $query)) {
  		if (mysqli_num_rows($resultado)>0) {
  			$result = 1;
  			$row     = mysqli_fetch_assoc($resultado);
			  $email           =  $row["email"];
			  $nombre          =  $row["nombre"];
			  $nroticket       =  $row["nro_ticket"];
			  $monto 		       =  $row["monto_ticket"];
        $fecha           =  date('d/m/Y H:i',strtotime($row["fecha_ticket"]));
			  $sucursal        =  $row["sucursal"];
			  $emailregistro	 =  $row["email_registro"];
        $archivo	       =  $row["archivo_ticket"];
        $estatus	       =  $row["estatus"];
        $observa         =  $row["observaciones"];
        $pos             =  $row["posicion"];
        $estatusdesc     = get_estatus_desc($estatus);
  			$accion          = 'Get registro id: '.$id;
	      log_write($accion);
  	}
  }
  Close($link);
 	return $result;
}

/* enviar ganadores: lógica del negocio para la entrega de ganadores y premios*/
function enviar_ganadores($fecha) {
  $pos        = 1;
  $premiook   = true;
  $ganacont   = 0;
  $hoy 		    = date("Y-m-d H:i:s");
  $link       = connect();
  $usuario    = $_SESSION['user'];

  // Query de ganadores, obtener los tres primeros del día en base a monto del ticket (mayores) y fecha insert (primeros)
  $consulta ="SELECT id, nombre, nro_ticket, monto_ticket, estatus, email
              FROM coro_registros
             WHERE estatus = 'AP' AND DATE_FORMAT(fecha_ticket, '%d/%m/%Y') = '".$fecha."'
          ORDER BY monto_ticket desc, fecha_insert asc
             LIMIT 3";

 //log_write($consulta);

  if ($resultado = mysqli_query($link, $consulta)) {
    while ($fila = mysqli_fetch_assoc($resultado)) {

      $idregistro = $fila['id'];  // id del registro del ticket
      $premios    = "";  // lista de id de premios

      // obtener los premios y asignarlos
      switch ($pos) {
       case 1:  /* ganador 1: dos boletos dobles para acudir al cine Cinépolis VIP. */
           $consulta = "SELECT id FROM coro_premios WHERE activo = 'S' AND estatus = 'PE' AND tipo = 'CINE' LIMIT 2";
           break;
       case 2:  /* ganador 2: 1 tarjetas de Netflix con crédito de $200.00 M.N. (Cien Pesos 00/100 Moneda Nacional), cada una. */
           //$consulta = "SELECT id FROM (SELECT id  FROM admin_coronasani.coro_premios WHERE activo = 'S' AND estatus = 'PE'  AND tipo = 'CINE' AND Monto = 200 LIMIT 1) A";
           //$consulta .= " UNION ";
           //$consulta .= "SELECT id FROM (SELECT id FROM admin_coronasani.coro_premios WHERE activo = 'S' AND estatus = 'PE'  AND tipo = 'AMAZ' AND Monto = 100 LIMIT 1) B";
           $consulta = "SELECT id FROM coro_premios WHERE activo = 'S' AND estatus = 'PE' AND tipo = 'NETF' LIMIT 1";
           break;
       case 3:  /* ganador 3: dos tarjetas de Spotify con crédito de $100.00 M.N. (Cien Pesos 00/100 Moneda Nacional), cada una.   */
           $consulta = "SELECT id FROM coro_premios WHERE activo = 'S' AND estatus = 'PE' AND tipo = 'SPOT' LIMIT 2";
           break;
       default:
           $consulta ="";
      }

      //log_write($consulta);

      if ($resultadoPremios = mysqli_query($link, $consulta)) {
        while ($filaPremio = mysqli_fetch_assoc($resultadoPremios)) {
          $idpremio = $filaPremio['id'];
          $premios .= $idpremio.',';

          /* Insert relacion premio / registro */
          $query ="INSERT INTO coro_ganadores";
          $query .="(id_registro, id_premio, usuario, fecha_insert)";
          $query .=" VALUES ($idregistro,$idpremio,'$usuario','$hoy')";

          if (mysqli_query($link, $query)) {
               log_write('Nuevo ganador ok idregistro '.$idregistro.' idpremio '.$idpremio);          }
          else {
              $error=$query;
              log_write('Nuevo ganador error query'.$error.' idregistro '.$idregistro.' idpremio '.$idpremio);
          }
          log_write_sql($query);

          /* update premio entregado */
          $query ="UPDATE coro_premios";
        	$query .=" SET estatus = 'EN', fecha_estatus = '$hoy', usuario= '$usuario'";
        	$query .=" WHERE id = ".$idpremio;
          //log_write($query);
          if (!mysqli_query($link, $query)) {
             $error=$query;
             log_write('Premio asignado error id '.$idpremio.' query: '.$error);
          }  else {
             log_write('Premio asignado ok id '.$idpremio);
          }
          mysqli_commit($link);
          $premiook = true;
          log_write_sql($query);
        }
      } else {
           log_write('Premios no disponibles '.$idregistro.' '.$pos);
           $premiook = false;
      }

      if ($premiook) {
        // cambiar de estatus a ganador
        $query ="UPDATE coro_registros";
      	$query .=" SET estatus = 'GA', fecha_estatus = '$hoy', posicion = $pos, usuario= '$usuario'";
      	$query .=" WHERE id = ".$idregistro;
        if (!mysqli_query($link, $query)) {
           $error=$query;
           log_write('Ganador error id '.$idregistro.' '.$estatus.'  query: '.$error);
        }  else {
           log_write('Ganador ok id '.$idregistro.' '.$estatus);
           $ganacont++;
        }
        mysqli_commit($link);
        log_write_sql($query);

        // enviar email
        $email      = $fila['email'];
        $nombre     = $fila['nombre'];
        $nro_ticket = $fila['nro_ticket'];
        log_write('Envio de premios por email: '.$email.'  id registro:'.$idregistro.' id premios:'.$premios);
        send_email_ganador($idregistro,$email,$nombre,$nro_ticket);
      }
      $pos++;
    } // while ganadores
    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
   }

  mysqli_commit($link);
  Close($link);
  return $ganacont;  // retornar la cantidad de ganadores
}

function login($user,$pass) {
  $valid='';
  $valid='Los datos de inicio de sesión son incorrectos';
  $link=connect();

  $username = mysqli_real_escape_string($link, $user);
  $password = mysqli_real_escape_string($link, $pass);

  //$password = md5($password);
  //$password=encrypt_decrypt('e',$password);
  $query = "SELECT '*' FROM coro_settings WHERE Module='Admin' AND  setting = '$username' AND value = '$password'";
  $result = mysqli_query($link, $query);
  while ($fila = mysqli_fetch_row($result)) {
        //$datos  =$fila[4];
        $_SESSION["user"] = $username;
        $valid  ='success';
        //$valid='success,'.$datos;
  }
  mysqli_free_result($result);
  Close($link);
  log_write('login: '.$user.' '.$valid);
  return $valid;
}

function logout() {
  log_write('logout: '.$_SESSION["user"]);
  session_unset();    // remove all session variables
  session_destroy();  // destroy the session
}

function checkusersession() {
  $result = 0;
  if(isset($_SESSION['user']) && ($_SESSION['user']!="")) {  $result = 1; }
  return $result ;
}
?>
