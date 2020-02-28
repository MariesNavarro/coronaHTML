<?php include 'header.php';?>

<section id="home">
  <div id="photo" class="backImgCover"></div>
  <div id="info">
    <img src="img/gana-fin.svg">
     <!-- <a href="registro.php" class="btns btRegistro trans5">
      <div class="color trans5"></div>
      <p>Registra</p>
    </a> -->
    <p style="line-height:1.2; font-size:1.6rem; color:#fff; margin-top: -20px;">GRACIAS <br> A  TODOS LOS <br>  PARTICIPANTES</p>
  </div>
</section>

<script>
	$(document).ready(function(){
	  	console.log('ready');
			$('footer').addClass('home');
	});
</script>

<?php include 'footer.php';?>
