<?php
	session_start();
	include('../core.php');
	// Se comprueba que se haya pasado por el formulario.
	if ( isset($_POST['login']) ){
		if( empty($_POST['usuari']) ){
			echo "<span style=\"color: red; font-size:20px;\">ERROR: Introdueix un usuari.</span><br>";
			echo "Redireccionando...";
			header( "refresh:2;url=/videoclub/index.php/login");
		}else{
			// Variables de sesión.
			if (comprobarLogin($_POST['usuari'], $_POST['contrasenya'])){
				$_SESSION['logged']['user'] = $_POST['usuari'];
				if ( isset($_POST['recordar'])){
					if ( $_POST['recordar'] == 'seleccionado' ){
						$recordar = true;
						setcookie("recordar",$recordar, time()+(60*60*24*365)); // 365 días.
						echo "<marquee direction=\"down\"><h1>Se han guardado sus datos.</h1></marquee>";
					}
				}
				echo "<br>comprobando sus datos...<br>";
				echo "<span style=\"color: green; font-size:20px;\">OK: Datos correctos.</span><br>";
				header( "refresh:2;url=/videoclub");
			}else{
				echo "comprobando sus datos...<br>";
				echo "<h3 style=\"color: red;\">ERROR: L'usuari i la contrassenya són incorrectes.</h3>";
				echo "Redireccionando...";
				header( "refresh:2;url=/videoclub/index.php/login");
			}
		}
	}else{
		if (isset($_SESSION['logged']['user'])){
			echo "Has accedido correctamente!<br>";
			echo "Redireccionando...";
			header( "refresh:2;url=/videoclub");
		}else{
			header("location:/videoclub/index.php/login");
		}
	}
?>