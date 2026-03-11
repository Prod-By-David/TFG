<style>
.button.is-rounded {
    border-radius: 9999px;
    padding-left: calc(1em + .25em);
    padding-right: calc(1em + .25em);
}

.button.is-success {
    background-color: #B01B00;
    border-color: transparent;
    color: #fff;
}
</style>

<div class="container is-fluid mb-6">
	<?php 
		$id = $insLogin->limpiarCadena($url[1]);

		// Solo el usuario "Administrador" tiene permisos especiales
		$es_admin = ($_SESSION['usuario'] === "Administrador");

		if ($id == $_SESSION['id']) { 
	?>
	<h1 class="title">MI CUENTA</h1>
	<h2 class="subtitle"><i class="fas fa-sync-alt"></i> &nbsp;Actualizar cuenta</h2>
	<?php } else { ?>
	<h1 class="title">USUARIOS</h1>
	<h2 class="subtitle"><i class="fas fa-sync-alt"></i> &nbsp;Actualizar usuario</h2>
	<?php } ?>
</div>

<div class="container pb-6 pt-6">
	<?php
	
		include "./app/views/inc/btn_back.php";

		$datos = $insLogin->seleccionarDatos("Unico", "usuario", "usuario_id", $id);

		if ($datos->rowCount() == 1) {
			$datos = $datos->fetch();
	?>

	<div class="columns is-flex is-justify-content-center">
    	<figure class="image is-128x128">
    		<?php
    			$foto = is_file("./app/views/fotos/" . $datos['usuario_foto']) 
    				? APP_URL . 'app/views/fotos/' . $datos['usuario_foto'] 
    				: APP_URL . 'app/views/fotos/default.png';

    			echo '<img class="is-rounded" src="' . $foto . '">';
    		?>
		</figure>
  	</div>

	<h2 class="title has-text-centered"><?php echo $datos['usuario_nombre'] . " " . $datos['usuario_apellido']; ?></h2>

	<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off">

		<input type="hidden" name="modulo_usuario" value="actualizar">
		<input type="hidden" name="usuario_id" value="<?php echo $datos['usuario_id']; ?>">

		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>NOMBRE<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="usuario_nombre" value="<?php echo $datos['usuario_nombre']; ?>" required>
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>APELLIDO<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="usuario_apellido" value="<?php echo $datos['usuario_apellido']; ?>" required>
				</div>
		  	</div>
		</div>

		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>USUARIO<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="usuario_usuario" value="<?php echo $datos['usuario_usuario']; ?>" required>
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>EMAIL</label>
				  	<input class="input" type="email" name="usuario_email" value="<?php echo $datos['usuario_email']; ?>">
				</div>
		  	</div>
		</div>

		<?php if ($es_admin): ?>
		<div class="columns">
		  	<div class="column">
		  		<label>CAJA DE VENTAS<?php echo CAMPO_OBLIGATORIO; ?></label><br>
				<div class="select">
				  	<select name="usuario_caja">
                        <?php
                            $datos_cajas = $insLogin->seleccionarDatos("Normal", "caja", "*", 0);

                            while ($campos_caja = $datos_cajas->fetch()) {
                            	$selected = ($campos_caja['caja_id'] == $datos['caja_id']) ? 'selected' : '';
                                echo '<option value="' . $campos_caja['caja_id'] . '" ' . $selected . '>Caja No.' . $campos_caja['caja_numero'] . ' - ' . $campos_caja['caja_nombre'] . '</option>';
                            }
                        ?>
				  	</select>
				</div>
		  	</div>
		</div>
		<?php endif; ?>

		<br><br>
		<h4 class="has-text-centered">
			<b><i>Si desea actualizar la clave de este usuario, complete los siguientes campos.</i></b>
		</h4>
		<br>

		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>NUEVA CLAVE</label>
				  	<input class="input" type="password" name="usuario_clave_1">
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>REPETIR NUEVA CLAVE</label>
				  	<input class="input" type="password" name="usuario_clave_2">
				</div>
		  	</div>
		</div>

		<?php if ($es_admin): ?>
		<br><br><br>
		<h4 class="has-text-centered">
			<b><i>Para actualizar los datos, ingrese su USUARIO y CLAVE de administrador.</i></b>
		</h4>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>USUARIO<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="administrador_usuario" required>
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>CLAVE<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="password" name="administrador_clave" required>
				</div>
		  	</div>
		</div>
		<?php endif; ?>

		<p class="has-text-centered">
			<button type="submit" class="button is-success is-rounded"><i class="fas fa-sync-alt"></i> &nbsp;Actualizar</button>
		</p>

	</form>
	<?php
		} else {
			include "./app/views/inc/error_alert.php";
		}
	?>
</div>