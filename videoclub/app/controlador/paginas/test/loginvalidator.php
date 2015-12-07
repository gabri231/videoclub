<?php
	session_start();

	///////////////////////////////////////////////
	//		FUNCIONES
	function comprobarLogin($usuari, $contrasenya){
		$parametres =  "host=localhost
						dbname=test 
						user=test 
						password=test";
		$connexio = pg_connect($parametres)
					or die("No se pudo conectar");

		$query ="SELECT username, password_hash FROM usuari WHERE username='".$usuari."' AND password_hash='".md5($contrasenya)."'";
		$consulta = pg_query($connexio, $query);
 
 		echo "CONSULTA SQL: <BR>".$query;

		if ($consulta) {
			pg_close($connexio);
			return true;
		}else{
			pg_close($connexio);
			return false;
		}
	}
	//		FIN FUNCIONES
	///////////////////////////////////////////////


	// Se comprueba que se haya pasado por el formulario.
	if ( isset($_POST['boto']) ){
		if( empty($_POST['usuari']) ){
			echo "<span style=\"color: red; font-size:20px;\">ERROR: Introdueix un usuari.</span><br>";
			echo "Redireccionando...";
			header( "refresh:2;url=login.html");
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
				header( "refresh:4;url=privada.php");
			}else{
				echo "comprobando sus datos...<br>";
				echo "<h3 style=\"color: red;\">ERROR: L'usuari i la contrassenya són incorrectes.</h3>";
				echo "Redireccionando...";
				header( "refresh:2;url=login.php");
			}
		}
	}else{
		if (isset($_SESSION['logged'])){
			echo "Has accedido correctamente!<br>";
			echo "Redireccionando...";
			header("refresh:1;url=privada.php");
		}else{
			header("location:login.php");
		}
	}
?>