<?php
  function getRealIP() {
      if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
      {
          $serv=$_SERVER['HTTP_X_FORWARDED_FOR'];
      	  //echo $serv;
     	  return $serv;
      }else{
      	$serv=$_SERVER['REMOTE_ADDR'];
      	return $serv;
      }
 }

 function getStamp(){
    list($Mili, $bot) = explode(" ", microtime());
    $DM=substr(strval($Mili),2,4);
    return strval(date("Y").'-'.date("m").'-'.date("d").' '.date("H").':'.date("i").':'.date("s").':'. $DM);
}

function log_write($respons) {
        // Archivo log
        $archivo = "./logs/log_dia_".date("Y.m.d").".txt";
        // Abrimos nuevamente el archivo a append
        $abre = fopen($archivo, "a");
        // escribimos la linea
        $grabar = fwrite($abre,getStamp().' '.getRealIP().' '.$respons.PHP_EOL);
        // Cerramos la conexión al archivo
        fclose($abre);
}

function log_write_sql($respons) {
        // Archivo log
        $archivo = "./logs/log_sql_".date("Y.m.d").".txt";
        // Abrimos nuevamente el archivo a append
        $abre = fopen($archivo, "a");
        // escribimos la linea
        $grabar = fwrite($abre,getStamp().' '.getRealIP().' '.$respons.PHP_EOL);
        // Cerramos la conexión al archivo
        fclose($abre);
}

function log_cont() {
  getRealIP();
  // CONTADOR POR DIA
  // Archivo en donde se acumulará el numero de visitas
  $archivo = "./logs/con_tot_".date("Y.m.d").".txt";
  // Abrimos el archivo para solamente leerlo (r de read)
  if (file_exists($archivo)) {
    $abre = fopen($archivo, "r");
    //Leemos el contenido del archivo
    $total_dia = fread($abre, filesize($archivo));
    // Cerramos la conexión al archivo
    fclose($abre);
  } else {$total_dia = 0;}
  // Abrimos nuevamente el archivo
  $abre = fopen($archivo, "w");
  // Sumamos 1 nueva visita
  $total_dia = $total_dia + 1;
  //$escrituravariable = "ip: ".$serv." numero: ".$total_dia."\n";
  // Y reemplazamos por la nueva cantidad de visitas
  $grabar = fwrite($abre, $total_dia);
  // Cerramos la conexión al archivo
  fclose($abre);
}

function log_cont_registro() {
  getRealIP();
  // CONTADOR POR DIA
  // Archivo en donde se acumulará el numero de visitas
  $archivo = "./logs/con_reg_".date("Y.m.d").".txt";
  // Abrimos el archivo para solamente leerlo (r de read)
  if (file_exists($archivo)) {
    $abre = fopen($archivo, "r");
    //Leemos el contenido del archivo
    $total_dia = fread($abre, filesize($archivo));
    // Cerramos la conexión al archivo
    fclose($abre);
  } else {$total_dia = 0;}
  // Abrimos nuevamente el archivo
  $abre = fopen($archivo, "w");
  // Sumamos 1 nueva visita
  $total_dia = $total_dia + 1;
  //$escrituravariable = "ip: ".$serv." numero: ".$total_dia."\n";
  // Y reemplazamos por la nueva cantidad de visitas
  $grabar = fwrite($abre, $total_dia);
  // Cerramos la conexión al archivo
  fclose($abre);
}

?>
