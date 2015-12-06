<?php
//////////////////////////////////////////////////////////////
//  CONTROLADORES
//header( "location: app/pages/");
require_once 'app/core.php';
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
//		COMPROBAMOS EL LOGIN
session_start();
if( isset($_COOKIE['recordar']) ){
	if( isset($_COOKIE['datosUsuario']) ){
		$datosUsuario = unserialize($_COOKIE["datosUsuario"]);	
		$_SESSION['logged'] = $datosUsuario;
	}	
}
if (isset($_SESSION['logged']['user'])){
	// Página privada
	$tituloPagina ="Bienvenido ".$_SESSION['logged']['user'].", este es tu videoclub.";
	require_once('app/includes/header_user.php');
	$logged = true;
}else{
	// Página publica
	$tituloPagina ="Bienvenido al videoclub.";
	require_once('app/includes/header.php');
	$logged = false;
}
/////////////////////////////////////////////////////////////////////////////
// enruta la petición internamente
$ruta = $_SERVER['REQUEST_URI'];	// $ruta = /videoclub/index.php
$ruta = substr($ruta, (strlen(PAGINA)-1)); 			// $ruta = /index.php

/////////////////////////////////////////////////////////////////////////////
//index.php    //////////////////////////////////////////////////////////////
if ($ruta == '/index.php/'){header('location: '.PAGINA.'index.php');}
if ($ruta == '/index.php' || $ruta == '/') {
	// Comprovamos si se han logeado los usuarios.
	if ($logged){
		include('app/pages/principal_privada.php');
	}else{
		include('app/pages/principal_publica.php');
	}
}
/////////////////////////////////////////////////////////////////////////////
// index.php/logout /////////////////////////////////////////////////////////
elseif ($ruta == '/index.php/logout') {
    echo $ruta;
    include('app/pages/cerrar.php');
} 
elseif ($ruta == '/index.php/show' && isset($_GET['id'])) {
    show_action($_GET['id']);
} 
else {
    header('Status: 404 Not Found');
    include('app/pages/error404.php');
}



// Footer
require_once('app/includes/footer.php');
//		FIN DE GENERACION DE PAGINA


echo $ruta;
?>