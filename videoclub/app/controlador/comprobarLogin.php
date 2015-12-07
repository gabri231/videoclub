<html>
<head>
	<title>Comprobar login</title>
	<link rel="stylesheet" type="text/css" href="../../web/css/estilo.css">
</head>
<body style="background: #3F3C00;">
<p style="margin-top:100px;"></p>
<?php
	session_start();
	include('../modelo/core.php');

	// Se comprueba que se haya pasado por el formulario.
	if ( isset($_POST['login']) ){
		if( empty($_POST['usuari']) ){
			?>
				<div class="infoRoja">
					<div class="left">
						<img width="40" src="../../web/img/plantilla/error.png">
					</div>
					<div style="margin-left: 0px;" class="rigth">
						<h1 class="center">No has introducido ningún usuario.</h1>
						<p class="center">Vuelve a intentarlo</p>
					</div>
				</div>
			<?php
			header( "refresh:3;url=".PAGINA."index.php/login");
		}else{
			// Variables de sesión.
			if (comprobarLogin($_POST['usuari'], $_POST['contrasenya'])){
				$_SESSION['logged']['user'] = $_POST['usuari'];
				if ( isset($_POST['recordar'])){
					if ( $_POST['recordar'] == 'seleccionado' ){
						$recordar = true;
						setcookie("recordar",$recordar, time()+(60*60*24*365)); // 365 días.
						?>
							<div class="infoVerde">
								<h1 class="center">Opción recordar marcada</h1>
							</div>
						<?php
					}
				}
				?>
					<div class="infoVerde">
						<div class="left">
							<img width="40" src="../../web/img/plantilla/ok.png">
						</div>
						<div class="rigth">
							<h1 class="center">OK: Datos correctos.</h1>
							<p class="center">Puedes pasar.</p>
						</div>
					</div>
				<?php
				header( "refresh:2;url=".PAGINA);
			}else{
				?>
					<div class="infoRoja">
						<div class="left">
							<img width="40" src="../../web/img/plantilla/error.png">
						</div>
						<div style="margin-left: 0px;" class="rigth">
							<h1 class="center">ERROR: El usuario y la contrasenya son incorrectos.</h1>
							<p class="center">No puedes pasar</p>
						</div>
					</div>
				<?php
				header( "refresh:3;url=".PAGINA."index.php/login");
			}
		}
	}else{
		if (isset($_SESSION['logged']['user'])){
			?>
				<div class="infoVerde">
					<div class="left">
						<img width="40" src="../../web/img/plantilla/ok.png">
					</div>
					<div class="rigth">
						<h1 class="center">Ya has iniciado sesión.</h1>
						<p class="center">Redireccionando...</p>
					</div>
				</div>
			<?php
			header( "refresh:2;url=".PAGINA);
		}else{
			header("location:".PAGINA."index.php/login");
		}
	}
?>

</body>
</html>