<?php
session_start();

$parametres =  "host=localhost dbname=test user=test password=test";
$connexio = pg_connect($parametres) or die("No se pudo conectar");

$usuari = "ed";
$contrasenya = "berkhamsted";
//$query ="SELECT username, password_hash FROM usuari WHERE username='ed'";
$query ="SELECT username, password_hash FROM usuari WHERE username='".$usuari."' AND password_hash='".md5($contrasenya)."'";
$consulta = pg_query($connexio, $query);

$registros= pg_num_rows($consulta);

echo "CONSULTA SQL: ".$query."<br><br>";

var_dump($consulta);

if (!$consulta) {
  echo "An error occurred.\n";
  exit;
}

for ($i=0;$i<$registros;$i++){
	$row = pg_fetch_array ( $consulta, $i );
	echo $row["username"]."<br>";
	echo $row["password_hash"];
}

pg_free_result($consulta);
pg_close($connexio);

?>