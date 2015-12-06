<?php
	session_start();
	if( isset($_COOKIE['recordar']) ){
		if( isset($_COOKIE['datosUsuario']) ){
			$datosUsuario = unserialize($_COOKIE["datosUsuario"]);	
			$_SESSION['logged'] = $datosUsuario;
			header( "location: compruebaLogin.php");
		}	
	}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel='stylesheet' href='../../web/css/loginEstilo.css'>
	</head>
	<body><center>
		<div class="menu">
		<h2>Bienvenido</h2>
			<form action="comprobarLogin.php" method="post" class="login">
				<div><label>Usuario: </label>		<input name="usuari" type="text" value="ed"></div>
				<div><label>Contraseña: </label>	<input name="contrasenya" type="password" value="berkhamsted"></div>
				<div><input type="checkbox" name="recordar" value="seleccionado"> Recordar contraseña </div>
				<div><input type="submit" name="login" value="Iniciar Sesion"></div>
			</form>
		</div>
	</center></body>
</html>
