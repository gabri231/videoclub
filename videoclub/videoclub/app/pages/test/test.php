<?php
	session_start();
	function comprobarLogin($usuari, $contrasenya){
		$parametres =  "host=localhost
						dbname=test 
						user=test 
						password=test";
		$connexio = pg_connect($parametres)
					or die("No se pudo conectar");

		$query ="SELECT username, password_hash FROM usuari WHERE username='".$usuari."' AND password_hash='".md5($contrasenya)."'";
		$consulta = pg_query($connexio, $query);
 
 		echo "CONSULTA SQL: <BR>".$query."<br>";
 	
 		var_dump($consulta);

		if ($consulta) {
			pg_close($connexio);
			return true;
		}else{
			pg_close($connexio);
			return false;
		}
	}
	comprobarLogin("ed","berkhamsted");
?>