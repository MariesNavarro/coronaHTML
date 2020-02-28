<?php
  $date_hoy = date("Y-m-d");
  $date_fin = "2020-02-29";
?>
<?php include 'header.php';?>

<section id="home">
  <div id="photo" class="backImgCover"></div>

<?php if ($date_hoy <= $date_fin) { ?>
  <div id="info">
    <img src="img/gana.svg">
     <a href="registro.php" class="btns btRegistro trans5">
      <div class="color trans5"></div>
      <p>Registra</p>
    </a>
    <p>¡Todos los días puedes participar!</p>
  </div>
<?php } else { ?>
  <div id="info">
    <img src="img/gana-fin.svg">
    <p style="line-height:1.2; font-size:1.6rem; color:#fff; margin-top: -20px;">GRACIAS <br> A  TODOS LOS <br>  PARTICIPANTES</p>
  </div>
<?php } ?>
</section>

<script>
	$(document).ready(function(){
	  	console.log('ready');
			$('footer').addClass('home');
	});
</script>

<?php include 'footer.php';?>
