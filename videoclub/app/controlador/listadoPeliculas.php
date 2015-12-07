<?php 
    $registros = obtenerListadoPeliculas();
    ob_start() 
?>

<table id="mitabla">
     <tr>
         <th>Pelicula</th>
         <th>Precio</th>
     </tr>
     <?php foreach ($registros as $registro) :?>
     <tr>
         <td><a href="index.php/verpelicula?id=<?php echo $registro[0]?>">
                 <?php echo $registro[0]?></a></td>
         <td><?php echo $registro[1]?></td>
     </tr>
     <?php endforeach; ?>
</table>

<?php 
    $contenido = ob_get_clean();

    $tituloPagina='Listado de peliculas';
    include 'app/vista/listadoPeliculas.php';
?>