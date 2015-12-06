<?php
	session_start();
	if( isset($_SESSION['logged']['user']) ){
		// Al cerrar sesión si existe la cookie 'recordar', se borra la cookie.
		if(isset($_COOKIE['recordar'])){
			setcookie("recordar","", time()-1); // 365 días.
		}
		session_destroy();
		header("Location: /videoclub");
	}else{
		header("Location: /videoclub");
	}	
?>