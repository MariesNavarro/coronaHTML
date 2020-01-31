function _(el){return document.querySelector(el); }
function __(el){return document.querySelectorAll(el); }
function loading(c){
	 if(c == "show") { $("#loading").removeClass("displayNone"); $("#loading").addClass("displayFlex");} else { $("#loading").removeClass("displayFlex");$("#loading").addClass("displayNone");}
	 let t19 = new TimelineMax({repeat: -1}); t19.fromTo(_("#square25"), 2, {x:-100,ease:Power0.easeNone},{x:160,ease:Power0.easeNone});
}

function popFoot(c){
		var wr = document.getElementById("popFoot");
		if(c === "open"){
			wr.setAttribute("class", "displayFlex");
		} else {
			wr.setAttribute("class", "displayNone");
		}
}

/******** regsitrar Ticket *******/
function registrar(sucursal, monto, nro, fecha,nombre, email,telef, cp) {
	    /*var huellalogin=huella();*/
			//loading("show");
		  var dataString ='&acc=1&suc='+sucursal+'&mon='+monto+'&nro='+nro+'&fec='+fecha+'&nom='+nombre+'&ema='+email+'&tel='+telef + '&cp='+cp;
		  console.log('registrar:'+dataString);
		  $.ajax({
		         type   : 'POST',
		         url    : 'respuesta.php',
		         data   :  dataString,
		         success:function(data) {
		           console.log('registrar: '+data);
		           if (data == 0 || data == -1 || data == -2) { // operación no exitosa
            			//window.location.href = "fallo.php?err="+data
									window.location.href = "mensaje.php?ms="+data;
		           } else  {  // operación exitosa
		           		// subir archivo
		           		var id = data;
		           		var result = sendfile(id,nro);
		           }
		         }
		  });
}

/******** aprobar o rechazar  Ticket *******/
function aprobar_rechazar(id,estatus,observa,fechadia) {
	    /*var huellalogin=huella();*/
		  var dataString ='&acc=4&id='+id+'&est='+estatus+'&obs='+observa;
		  console.log('aprobar_rechazar:'+dataString);
		  $.ajax({
		         type   : 'POST',
		         url    : 'respuesta.php',
		         data   :  dataString,
		         success:function(data) {
          			window.location.href = "home.php?fe="+fechadia;
		         }
		  });
}


/******** sendfile *******/
function sendfile(id,nro){

	  if($('#ticketFile')[0].files.length>0)
	  {
  		var file_data = $('#ticketFile').prop('files')[0];
    	var form_data = new FormData();
    	var result = 0;

    	form_data.append('file', file_data);
    	form_data.append('id',id);
			form_data.append('nro',nro);
    	console.log('sendfile:'+id);
	    $.ajax({
	        type: 'post',
	        url:  'upload.php',
	        processData: false,
	        contentType: false,
	        data: form_data,
	        success: function (response) {
	          	console.log('sendfile: '+response);
          		if ( response > 0 ) {
            	  window.location.href = "mensaje.php?id="+id+"&ms="+response;
            	} else {
            	 	window.location.href = "mensaje.php?ms=0";
            	}
	        },
	        error: function (err) {
	        	result = 0;
	            console.log('sendfile: '+err);
	            //window.location.href = "fallo.php";
	        }
	    });
	  }
	  return result;
}

/******** get ganadores  *******/
function get_ganadores(fecha) {
	    /*var huellalogin=huella();*/
		  var dataString ='&acc=2&fec='+fecha;
		  console.log('get_ganadores:'+dataString);
		  $.ajax({
		         type   : 'POST',
		         url    : 'respuesta.php',
		         data   :  dataString,
		         success:function(data) {
							 $("#winnersList").empty();
							 $("#winnersList").append(data);
		         }
		  });
}

/******** get registros  *******/
function get_registros(fecha) {
	    /*var huellalogin=huella();*/
		  var dataString ='&acc=3&fec='+fecha;
		  console.log('get_registros:'+dataString);
		  $.ajax({
		         type   : 'POST',
		         url    : 'respuesta.php',
		         data   :  dataString,
		         success:function(data) {
							 $("#lstRegistrosdia").empty();
							 $("#lstRegistrosdia").append(data);
							 $("#contap").text($("#contaph").val());
							 $("#contre").text($("#contreh").val());
							 $("#contpe").text($("#contpeh").val());
							 $("#contga").text($("#contgah").val());
							 if ($("#contgah").val()>=1) { // si ya hay ganadores no habilitar boton
								  $('#msg').text('Ya fueron enviados los ganadores de este día');
								 	$('#btnEnviar').css('display', 'none');
							 } else {
								 if ($("#contaph").val()>=1) { // si ya hay aprobados  habilitar boton
									  $('#msg').text('¿Quieres enviar los ganadores del día?');
									 	$('#btnEnviar').css('display', 'block');
								} else {
									  $('#msg').text('Debes tener al menos 1 ticket aprobado para poder enviar los ganadores');
							 	 		$('#btnEnviar').css('display', 'none');
								}
							 }
		         }
		  });
}

/******** enviar ganadores *******/
function enviar_ganadores(fecha) {
	showPop('hide');
	loading("show");
	var dataString ='&acc=5&fec='+fecha;
	console.log('enviar_ganadores:'+dataString);
	$.ajax({
				 type   : 'POST',
				 url    : 'respuesta.php',
				 data   :  dataString,
				 success:function(data) {
					 console.log(data);
					 if (data == 1) {	 $("#msgAprobadosEnviados").text("Fue enviado " + data + " ganador del día "+ fecha); }
					 else  if (data > 1) {	 $("#msgAprobadosEnviados").text("Fueron enviados " + data + " ganadores del día "+ fecha); }
					 loading("hide");
					 showPopEnviados("show");
				 }
	});
}

/******** enviar email con el registro *******/
function send_email_registro(id,email,nombre,sucursal,nroticket,monto,fecha,ms,msg) {
	var dataString ='&acc=6&id='+id+'&ema='+email+'&nom='+nombre+'&nro='+nroticket+'&suc='+sucursal+'&mon='+monto+'&fec='+fecha;
	console.log('send_email_registro:'+dataString);
	loading("show");
	$.ajax({
				 type   : 'POST',
				 url    : 'respuesta.php',
				 data   :  dataString,
				 success:function(data) {
					 console.log(data);
					 loading("hide");
					 chooseMsg(ms,msg);
					 //$('#msgEmail').text('Email enviado con los premios');
				 }
	});
}

/******** enviar email con los premios de un ganador *******/
function send_email_ganador(id,email,nombre,nro_ticket) {
	var dataString ='&acc=7&id='+id+'&ema='+email+'&nom='+nombre+'&nro='+nro_ticket;
	console.log('send_email_ganador:'+dataString);
	loading("show");
	$.ajax({
				 type   : 'POST',
				 url    : 'respuesta.php',
				 data   :  dataString,
				 success:function(data) {
					 console.log(data);
					 loading("hide");
					 $('#msgEmail').text('Email enviado con los premios');
				 }
	});
}

/******** emailIsValid *******/
function emailIsValid (email) {
  		return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
}

/******** cpIsValid *******/
function cpIsValid (cp) {
  		return /^\d{4,5}/.test(cp);
}


/******** loadFileName *******/
function loadFileName(t){
  var file = t.nextElementSibling,
      fileNameW = t.children[1];
	console.log('click load');
  file.addEventListener("change", function(){
    fileNameW.innerHTML = file.files[0].name;
  });
}

/******** Login *******/
function login(user,pass){
	var dataString ='&acc=8&usr=' + user + '&pwd=' + pass;
  $.ajax({
         type   : 'POST',
         url    : 'respuesta.php',
         data   :  dataString,
         success:function(data) {
           console.log(data);
           if (data!='success') {
              // errorOnLog('open',data);
							$('#msgPass').text(data);
           } else {
              window.location.href='home.php';
           }
         }
      });
}

/******** logout *******/
function logout(user,pass){
	var dataString ='&acc=9';
  $.ajax({
         type   : 'POST',
         url    : 'respuesta.php',
         data   :  dataString,
         success:function(data) {
           console.log(data);
           window.location.href='login.php';
         }
      });
}
/******** para mensaje.php  *******/
function chooseMsg(n,msg){
	var ic = _("#icon"), p = _("#mensaje>p"), r1 = _("#r1"), r2 = _("#r2");
	//console.log(n+' '+msg);
	if(n > 0){
		ic.setAttribute("class", "enviado"); p.innerHTML = msg; r1.setAttribute("class", "displayBlock");
	} else if (n === -1) {
		ic.setAttribute("class", "duplicado"); p.innerHTML = msg; r2.setAttribute("class", "displayBlock");
	} else {
		ic.setAttribute("class", "error"); p.innerHTML = msg; r2.setAttribute("class", "displayBlock");
	}
 }
