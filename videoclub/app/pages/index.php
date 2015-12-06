<?php
//////////////////////////////////////////////////////////////
//		COMPROBAMOS EL LOGIN
session_start();
if( isset($_COOKIE['recordar']) ){
	if( isset($_COOKIE['datosUsuario']) ){
		$datosUsuario = unserialize($_COOKIE["datosUsuario"]);	
		$_SESSION['logged'] = $datosUsuario;
	}	
}
//////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////
//		GENERAMOS LA PAGINA
// funciones de la aplicación videoclub.
require_once('../core.php');

// Comprovamos si se han logeado los usuarios.
if (isset($_SESSION['logged']['user'])){
	// Página privada
	$tituloPagina ="Bienvenido ".$_SESSION['logged']['user'].", este es tu videoclub.";
	require_once('../includes/header_user.php');
	include('principal_privada.php');
}else{
	// Página publica
	$tituloPagina ="Bienvenido al videoclub.";
	require_once('../includes/header.php');
	include('principal_publica.php');
}

// Footer
require_once('../includes/footer.php');
//		FIN DE GENERACION DE PAGINA
//////////////////////////////////////////////////////////////
?>