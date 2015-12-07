<?php
	if( isset($_SESSION['logged']['user']) ){
		// Al cerrar sesión si existe la cookie 'recordar', se borra la cookie.
		if(isset($_COOKIE['recordar'])){
			setcookie("recordar","", time()-1); // 365 días.
		}
		session_destroy();

		$tituloPagina='Cerrar sesión videoclub';
		require 'app/vista/cerrar.php';

		header( "refresh:4;".PAGINA);
	}else{
		header("Location:".PAGINA);
	}
?>