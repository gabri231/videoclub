<?php
  date_default_timezone_set("Europe/Madrid");

  if (isset($_SESSION['logged']['user'])){
    $usuari = $_SESSION['logged']['user'];
    $hoy = [
      "fecha" => date("d/m/Y"),
      "hora"  => date("H:i:s"),
      ];
    // Array con los datos del usuario
    $datosUsuario = [
        "user"    => $usuari,
        "lastVisit" => $hoy,
        ];

    // antes del set cookie, puede comprobar que no hay nada que genere codigo html.
    setcookie("datosUsuario",serialize($datosUsuario), time()+(60*60*24*365)); // 365 días.
  }

?>  
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php echo $tituloPagina; ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo PAGINA; ?>web/css/estilo.css" />
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo PAGINA; ?>web/img/plantilla/favicon.ico">
  <script src="<?php echo PAGINA?>web/js/main.js"></script>
  <script src="<?php echo PAGINA?>web/js/jquery.min.js"></script>
</head>
<body>
  <div id="container">
    <div id="login">
      <form>
          <?php
            if ( isset($_COOKIE['datosUsuario']) ){
              $datosUsuario = unserialize($_COOKIE["datosUsuario"]);  
              if ( $datosUsuario['user'] == $_SESSION['logged']['user']){
                $fecha = $datosUsuario['lastVisit']['fecha'];
                $hora = $datosUsuario['lastVisit']['hora'];
                echo "Última actividad el ".$fecha." a las ".$hora." - ";
              }else{
                echo "No eres el último usuario que ha visitado la página web - ";}
            }else{
              echo "No has visitado anteriormente esta página. - ";
            }

            echo "Cuando vuelvas ";
            echo (isset($_COOKIE['recordar'])) ? "<b>no tendrás</b>" : "<b>tendrás</b>";
            echo " que introducir tus datos.";
          ?>
        <input type="button" value="<?php echo "Hola ".$_SESSION['logged']['user']?>">
        <a href="<?php echo PAGINA; ?>index.php/logout"><input type="button" value="Salir"></a>
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
          <li><a href="<?php echo PAGINA; ?>index.php/generos">generos</a></li>
          <li><a href="<?php echo PAGINA; ?>index.php/ultimas">ultimas</a></li>
          <li><a href="<?php echo PAGINA; ?>index.php/contacto">contacto</a></li>
        </ul>
      </nav>
  </div>

    <div style="clear:both;"></div>
    <div id="izquierda">
      <div class="cajasIzq">
        <h2>Ultimas peliculas</h2>
        <p>Esta es una sección para las ultimas peliculas que vayan apareciendo.</p>
      </div>

      <div class="cajasIzq">
        <h2>Enlaces de interes</h2>
        <p><a href="<?php echo PAGINA; ?>index.php" title="home">Inicio</a><br/>
        <a href="<?php echo PAGINA; ?>index.php/peliculas" title="peliculas">Peliculas</a><br/>
        <a href="<?php echo PAGINA; ?>index.php/registro" title="registro">registrate</a>
        <br />
      </div>
    </div>



    <div id="cuerpo">
    <!-- CONTENIDO A INCLUIR -->
