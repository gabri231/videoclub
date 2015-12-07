<?php
	////////////////////////////////////////////
	// HEADER DE LA PAGINA
	if ($logged) { require_once 'app/vista/includes/header_user.php'; 
		echo "<p class=\"done\">Ya has iniciado sesión</p>";
		echo "<p class=\"info\">Puedes continuar navegando</p>";
	}
	else{ 
		require_once 'app/vista/includes/header.php';
	// FIN HEADER DE LA PAGINA
	////////////////////////////////////////////
?>
<div class="entrada">
	<div class="titulo"><h1>asdasd</h1>
	</div>
	<form action="<?php echo PAGINA?>app/controlador/comprobarLogin.php" method="post" class="formulario">

		<div><label>Usuario: </label>		<input name="usuari" type="text" value="gabriel"></div>
		<div><label>Contraseña: </label>	<input name="contrasenya" type="password" value="gabriel"></div>
		<div class="center">
			<input type="checkbox" name="recordar" value="seleccionado"> Recordar contraseña
			<input type="submit" name="login" value="Iniciar Sesion">
		</div>
	</form>
</div>
<?php
	}
	////////////////////////////////////////////
	// FOOTER DE LA PAGINA
	require_once 'app/vista/includes/footer.php';
	// FIN FOOTER DE LA PAGINA
	////////////////////////////////////////////
?>