<?php
  ////////////////////////////////////////////
  // HEADER DE LA PAGINA
  require_once 'app/vista/includes/header_user.php';
  // FIN HEADER DE LA PAGINA
  ////////////////////////////////////////////
?>

<div class="entrada">
  <div class="titulo">
    <h1>Bienvenido <?php echo strtoupper($_SESSION['logged']['user']);?> al VIDEOCLUB de Gabriel</h1>
  </div>
  <p class="info">Este apartado es de acceso <b>privado</b>.</p>
  <p class="done">Eres un usuario registrado, gracias.</p>
  <p>
    Te damos la bienvenida a nuestro videoclub donde encontrarás contenido exclusivo con la calidad más alta del mercado.
    Muchas gracias por confiar en nosotros.<br><br></p>

    <p><b>Te lo agradecemos de verdad!</b>
  </p>
</div>

<?php
  ////////////////////////////////////////////
  // FOOTER DE LA PAGINA
  require_once 'app/vista/includes/footer.php';
  // FIN FOOTER DE LA PAGINA
  ////////////////////////////////////////////
?>