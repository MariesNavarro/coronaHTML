<?php
  /* validar inicio de sesion */
  session_start();
  //echo 'user:'.$_SESSION['user'];
  if(!(isset($_SESSION['user']) && ($_SESSION['user']!=""))) {
    header("Location:https://ganaenlaferiacorona.com/login.php");
  }
?>
