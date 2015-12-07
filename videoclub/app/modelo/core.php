<?php
 	ini_set('display_errors', 1);
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
	//		COMPROBAR LOGIN, USUARIO/CONTRASENYA
	function comprobarLogin($usuari, $contrasenya){
		$conexion = conectaBBDD();

		$query ="SELECT login, password FROM soci WHERE login='".$usuari."' AND password='".md5($contrasenya)."'";
		$consulta = pg_query($conexion, $query);
 		
 		//Si la consulta da un resultado de 1
		if (pg_numrows($consulta)==1){
			desconectaBBDD($conexion);
			return true;
		} else {
			desconectaBBDD($conexion);
			return false;
		}
	}
	///////////////////////////////////////////////
	//		CONSULTAS SQL
	//      +++++++++++++
	//		FUNCION CONSULTA GENERICA.
	//		Devuelve el un array con el resultado de una consulta sql.
	//
	function consultaGenerica($query){
		$conexion = conectaBBDD();

		$consulta = pg_query($conexion, $query);
 
		if ($consulta) {
			while ($row = pg_fetch_row($consulta)) {
			  $registros[] = $row;
			}
			desconectaBBDD($conexion);
			return $registros;
		}else{
			echo pg_last_error();
			desconectaBBDD($conexion);
			return false;
		}
	}
	//  ++++++++++++++++++++++++++++++++
	//	CONSULTA DE LISTADOS DE PELICULAS
	function obtenerListadoPeliculas(){
		$query ="SELECT titol, preu FROM pelicula";
		return consultaGenerica($query);
	}
	//		FIN FUNCIONES
	///////////////////////////////////////////////

	///////////////////////////////////////////////
	//		SENTENCIAS SQL
	//      ++++++++++++++
	//
	function sentenciaSql($query){
		// Crear un usuarios de bases de datos
		$conexion = conectaBBDD();
		$resultado = pg_query($conexion, $query);
		if ($resultado) {
			desconectaBBDD($conexion);
			return true;
		}
		else{
			echo pg_last_error();
			desconectaBBDD($conexion);
			return false;
		}
	}


	//	VALIDAR DNI
	function validarDni($dni){
		$letra = substr($dni, -1);
		$numeros = substr($dni, 0, -1);
		if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
			return true;
		}else{
			return false;
		}
	}


//// FIN ////////////////////////////////////////////////
?>