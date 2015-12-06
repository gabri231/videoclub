<?php
	///////////////////////////////////////////////
	//	DEFICION DE LA PAGINA WEB.
	include('configuracion.php');
	///////////////////////////////////////////////
	//		FUNCIONES BASES DE DATOS
	// Función para conectarse a la base datos.
	function conectaBBDD(){
		$conexion = pg_connect(PARAMETROS) or die("No se pudo conectar");
		return $conexion;
	}
	// Función para desconectarse a la base datos.
	function desconectaBBDD($conexion){
		pg_close($conexion);
	}
	//		FIN FUNCIONES BASES DE DATOS
	///////////////////////////////////////////////

	///////////////////////////////////////////////
	//		FUNCIONES
	function comprobarLogin($usuari, $contrasenya){
		$conexion = conectaBBDD();

		$query ="SELECT username, password_hash FROM usuari WHERE username='".$usuari."' AND password_hash='".md5($contrasenya)."'";
		$consulta = pg_query($conexion, $query);
 
		if ($consulta) {
			desconectaBBDD($conexion);
			return true;
		}else{
			echo pg_last_error();
			desconectaBBDD($conexion);
			return false;
		}
	}
	//		FIN FUNCIONES
	///////////////////////////////////////////////
?>