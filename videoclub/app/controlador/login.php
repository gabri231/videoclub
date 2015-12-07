<?php
	if( isset($_COOKIE['recordar']) ){
		if( isset($_COOKIE['datosUsuario']) ){
			$datosUsuario = unserialize($_COOKIE["datosUsuario"]);	
			$_SESSION['logged'] = $datosUsuario;
			?>
				<!-- html -->
				<div class="infoVerde">
					<div class="left">
						<img width="40" src="../../web/img/plantilla/ok.png">
					</div>
					<div class="rigth">
						<h1 class="center">Recuperando tu sesión guardada.</h1>
						<p class="center">Redireccionando...</p>
					</div>
				</div>
				<!-- html -->
			<?php
			header( "refresh:3;url=".PAGINA);
		}
	}

	$tituloPagina='Iniciar sesión';
	require 'app/vista/login.php';
?>