<?php include 'header.php';?>

<section id="home">
  <div id="photo" class="backImgCover"></div>
  <div id="info">
    <img src="img/gana.svg">
     <a href="registro.php" class="btns btRegistro trans5">
      <div class="color trans5"></div>
      <p>Registra</p>
    </a>
    <p>¡Todos los días puedes participar!</p>
  </div>
</section>

<script>
	$(document).ready(function(){
	  	console.log('ready');
			$('footer').addClass('home');
	});
</script>

<?php include 'footer.php';?>
