<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php echo $tituloPagina; ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo PAGINA; ?>web/css/estilo.css" />
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo PAGINA; ?>web/img/plantilla/favicon.ico">
</head>
<body>
  <div id="container">
    <div id="login">
      <form action="<?php echo PAGINA; ?>app/pages/comprobarLogin.php" method="post">
        Usuario: <input name="usuari" type="text" value="ed">
        Contraseña: <input name="contrasenya" type="password" value="ed">
        <input type="checkbox" name="recordar" value="seleccionado">Recordar
        <input type="submit" name="login" value="Iniciar Sesion">
        <a href="<?php echo PAGINA; ?>index.php/registro"><input type="button" value="Registrate"></a>
      </form>
    </div>
    <div id="nombre"> 
      <span id="tituloPagina">Peliculas</span> <br />
      <span id="subTituloPagina">Sitio de peliculas de Gabriel</span>
    </div>
    <div id="cabecera">
      <nav id="menu">
        <ul>
          <li><a href="<?php echo PAGINA; ?>index.php">Inicio</a></li>
          <li><a href="<?php echo PAGINA; ?>index.php/peliculas">peliculas</a></li>
          <li><a href="<?php echo PAGINA; ?>index.php/gabriel">gabriel</a></li>
          <li><a href="<?php echo PAGINA; ?>index.php/login">logeate</a></li>
          <li><a href="<?php echo PAGINA; ?>index.php/registro">registrate</a></li>
        </ul>
      </nav>
  </div>

    <div style="clear:both;"></div>
    <div id="izquierda">
      <div class="cajasIzq">
        <h2>Ultimas peliculas</h2>
        <p>Esta es una sescción para las ultimas peliculas que vayan apareciendo.</p>
      </div>

      <div class="cajasIzq">
        <h2>Enlaces de interes</h2>
        <p>
        <a href="<?php echo PAGINA; ?>index.php" title="home">Inicio</a><br/>
        <a href="<?php echo PAGINA; ?>index.php/peliculas" title="about">Peliculas</a><br/>
        <a href="<?php echo PAGINA; ?>index.php/registro" title="links">registrate</a>
        <br />
      </div>
    </div>



    <div id="cuerpo">
    <!-- CONTENIDO A INCLUIR -->
