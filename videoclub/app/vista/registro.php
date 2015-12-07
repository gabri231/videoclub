<?php
  ////////////////////////////////////////////
  // HEADER DE LA PAGINA
  	if ($logged) { require_once 'app/vista/includes/header_user.php'; }
	else{ require_once 'app/vista/includes/header.php'; }
  // FIN HEADER DE LA PAGINA
  ////////////////////////////////////////////
?>

<div class="entrada">
	<div class="titulo"><h1>Registrate</h1></div>
	<?php echo $contenido ?>

</div>

<?php
  ////////////////////////////////////////////
  // FOOTER DE LA PAGINA
  require_once 'app/vista/includes/footer.php';
  // FIN FOOTER DE LA PAGINA
  ////////////////////////////////////////////
?>