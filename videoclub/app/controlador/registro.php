<?php
    if(isset($_POST['boton'])){
    	$errors=array();
        if($_POST['nombre'] == ''){
            $errors[1] = '<span class="errores">Introduce un login.</span>';
        }
        if($_POST['password1'] == '' || $_POST['password2'] == ''){
            $errors[2] = '<span class="errores">Introduce contraseñas correctas.</span>';
        }
        if($_POST['dni'] == ''){
            $errors[3] = '<span class="errores">Introduce un dni.</span>';
        }else{
        	if(!validarDni(strtoupper($_POST['dni']))){
        		$errors[3] = '<span class="errores">El dni no es correcto.</span>';
        	}
        }
        if($_POST['nombre'] == ''){
            $errors[4] = '<span class="errores">Introduce un nombre.</span>';
        }
        if($_POST['apellidos'] == ''){
            $errors[5] = '<span class="errores">Introduce tus apellidos.</span>';
        }
        if($_POST['fecha'] == ''){
        	// view-source:http://www.emenia.es/demos-blog/calendario/index4.htm
            $errors[6] = '<span class="errores">Introduce tu fecha de nacimiento.</span>';
        }else{
        	$partes= explode("/", $_POST['fecha']); 
        	// checkdate mes dia año
			if (checkdate ($partes[1],$partes[0],$partes[2])){ 
				echo '<span class="errores">La fecha es correcta.</span>'; 
			} else { 
				echo "La fecha no es correcta";
				$errors[6] = '<span class="errores">La fecha no es correcta.</span>';
			} 
        }
        if($_POST['direccion'] == ''){
            $errors[7] = '<span class="errores">Introduce una direccion.</span>';
        }
        if($_POST['telefono'] == ''){
            $errors[8] = '<span class="errores">Introduce un teléfono.</span>';
        }
        if($_POST['sexo'] == ''){
        	$errors[9] = '<span class="errores">Selecciona un género.</span>';	
        }


		if(isset($errors)){
			if (count($errors) > 0){
				$resultado = false;
			}else{
				$resultado = true;
			}
		}

        if($resultado){
        	$_POST['nombre'] = '';
            $_POST['email'] = '';
            $_POST['asunto'] = '';
            $_POST['mensaje'] = '';
      		$result = "<p class=\"done\">Exito al enviar los datos <img class=\"carita\" src=\"".PAGINA."web/img/plantilla/feliz.gif\" alt=\":(\"> </p>";
        }else{
        	$result = "<p class=\"error\">Hubo un error al enviar el mensaje <img class=\"carita\" src=\"".PAGINA."web/img/plantilla/triste.gif\" alt=\":(\"> </p>";
        }
    }
?>
<?php 
	ob_start();
?>
	<form class='formulario' method='POST' action=''>
		<div><label>Login:</label><input type='text' name='login' value="<?php if(isset($_POST['login'])){ echo $_POST['login']; } ?>">								<?php if(isset($errors[1])){ echo $errors[1]; } ?></div>
		<div><label>Contraseña:</label><input type='text'  name='password1' value="<?php if(isset($_POST['password1'])){ echo $_POST['password1']; } ?>">			<?php if(isset($errors[2])){ echo $errors[2]; } ?></div>
		<div><label>Repite tu contraseña:</label><input type='text' name='password2' value="<?php if(isset($_POST['password2'])){ echo $_POST['password2']; } ?>">	<?php if(isset($errors[2])){ echo $errors[2]; } ?></div>
		<div><label>DNI:</label><input type='text' name='dni'  maxlength="9" value="<?php if(isset($_POST['dni'])){ echo $_POST['dni']; } ?>">										<?php if(isset($errors[3])){ echo $errors[3]; } ?></div>
		<div><label>Nombre:</label><input type='text' name='nombre' value="<?php if(isset($_POST['nombre'])){ echo $_POST['nombre']; } ?>">							<?php if(isset($errors[4])){ echo $errors[4]; } ?></div>
		<div><label>Apellidos:</label><input type='text' name='apellidos' value="<?php if(isset($_POST['apellidos'])){ echo $_POST['apellidos']; } ?>">				<?php if(isset($errors[5])){ echo $errors[5]; } ?></div>
		<div><label>Año de nacimiento:</label><input type='text' name='fecha' value="<?php if(isset($_POST['fecha'])){ echo $_POST['fecha']; } ?>">					<?php if(isset($errors[6])){ echo $errors[6]; } ?></div>
		<div><label>Dirección:</label><input type='text' name='direccion' value="<?php if(isset($_POST['direccion'])){ echo $_POST['direccion']; } ?>">				<?php if(isset($errors[7])){ echo $errors[7]; } ?></div>
		<div><label>Telefono:</label><input type='text' name='telefono' value="<?php if(isset($_POST['telefono'])){ echo $_POST['telefono']; } ?>">					<?php if(isset($errors[8])){ echo $errors[8]; } ?></div>
		<div><label>Sexo:</label>
			<select name="sexo">
				<?php 
				if(isset($_POST['sexo'])){
					if($_POST['sexo'] == 'h'){
						echo '<option value="">Selecciona una opción';
						echo '<option value="h" selected>Hombre';
						echo '<option value="m">Mujer';
					}elseif ($_POST['sexo'] == 'm') {
						echo '<option value="">Selecciona una opción';
						echo '<option value="h">Hombre';
						echo '<option value="m" selected>Mujer';
					}else{
						echo '<option value="" selected>Selecciona una opción';
						echo '<option value="h">Hombre';
						echo '<option value="m">Mujer';
					}
				}else{
					echo '<option value="" selected>Selecciona una opción';
					echo '<option value="h">Hombre';
					echo '<option value="m">Mujer';
				}
				?>
			</select><?php if(isset($errors[9])){ echo $errors[9];} ?>
		</div>
 	    <div class="center"><input type='submit' value='Envia Mensaje' name='boton'></div>
	    <?php if(isset($result)){ echo $result; }?>
	</form>
<?php 
	$contenido = ob_get_clean();

	$tituloPagina = "Registro de usuario";
	require 'app/vista/registro.php';
?>
<!--<div><label>Mensaje:</label><textarea rows='6' class='mensaje' name='mensaje'><php if(isset($_POST['mensaje'])){ echo $_POST['mensaje']; } ></textarea></div>-->