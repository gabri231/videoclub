<?php
	////////////////////////////////////////////
	// HEADER DE LA PAGINA
	if ($logged) { require_once 'app/vista/includes/header_user_no_menu.php'; }
	else{ require_once 'app/vista/includes/header_no_menu.php'; }
	// FIN HEADER DE LA PAGINA
	////////////////////////////////////////////
?>
<div class="entrada">
  <div class="titulo">
    <h1>ERROR 404, página no encontrada.</h1>
  </div>
  <div class="centrado">
	  <p class="error"><b>ERROR 404</b>. La página <b><?php echo $ruta;?></b> no ha sido encontrada!</p>
	  <p class="info"> Igualmente puedes seguir navegando.</p>
	  <p class="center">ERROR 404<br><img style="border-radius: 30px; border: 1px solid black;" src="/videoclub/web/img/404.png"/></p><br>
	  <p class="center">No intentes hacer magia ;)<br><br></p>
  </div>
</div>

<?php
	////////////////////////////////////////////
	// FOOTER DE LA PAGINA
	require_once 'app/vista/includes/footer.php';
	// FIN FOOTER DE LA PAGINA
	////////////////////////////////////////////
?>