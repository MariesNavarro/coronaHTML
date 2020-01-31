<?php include 'headeradmin.php';?>

<section id="login" class="displayFlex">
  <div class="displayFlex">
    <label for="user">Usuario</label>
    <input type="text" name="user" placeholder="Usuario" id="userNameLog">
    <p class="alerta" id="msgUser"></p>
  </div>
  <div class="displayFlex">
    <label for="pass">Password</label>
    <input type="password" name="pass" placeholder="Contraseña" id="userPassLog">
    <p class="alerta" id="msgPass"></p>
  </div>
  <a role="button" class="btns btnEnviar" id="btnLogin">
    <div class="color trans5"></div>
    <p>Entrar</p>
  </a>
</section>

<script>
	$(document).ready(function(){
	  	console.log('ready');
	    $('#btnLogin').on('click', function (e) {
	      var user 		  = $("#userNameLog").val();
	      var pass 			= $("#userPassLog").val();
		   	var validOk   = true;
		   	var msgError  = "";

				$('#msgUser').text(msgError);
				$('#msgPass').text(msgError);

		   // Validaciones
		   if (user=="") {	msgError = "Debe especificar el usuario"; $('#msgUser').text(msgError); validOk = false; }
	  	 if (pass=="") { 	msgError = "Debes especificar la contraseña";	$('#msgPass').text(msgError); validOk = false; }
		   //console.log(validOk+' '+msgError);

		   if (validOk) {	login(user,pass); }

	    });
	});
</script>
