<style>
.button.is-rounded {
    border-radius: 9999px;
    padding-left: calc(1em + .25em);
    padding-right: calc(1em + .25em);
}

.button.is-info {
    background-color: #B01B00;
    border-color: transparent;
    color: #fff;
}

.button.is-link.is-light {
    background-color: #eff1fa;
    color: #B01B00;
}
</style>

<div class="container is-fluid mb-6">
	<h1 class="title">USUARIOS</h1>
	<h2 class="subtitle"><i class="fas fa-user-tie fa-fw"></i> &nbsp;Nuevo usuario:</h2>
</div>

<div class="container pb-6 pt-6">
	<?php if ($_SESSION['usuario'] === "Administrador") { ?>
	<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off" enctype="multipart/form-data" >

		<input type="hidden" name="modulo_usuario" value="registrar">

		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>NOMBRE<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>APELLIDO O APELLIDOS<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="usuario_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>USUARIO<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="usuario_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>EMAIL</label>
				  	<input class="input" type="email" name="usuario_email" maxlength="70" >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>CLAVE<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>REPETIR CLAVE<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
				<div class="file has-name is-boxed">
					<label class="file-label">
						<input class="file-input" type="file" name="usuario_foto" accept=".jpg, .png, .jpeg" >
						<span class="file-cta">
							<span class="file-label">
								Seleccione una foto
							</span>
						</span>
						<span class="file-name">JPG, JPEG, PNG. (MAX 5MB)</span>
					</label>
				</div>
		  	</div>
		  	<div class="column">
		  		<label>CAJA DE VENTAS<?php echo CAMPO_OBLIGATORIO; ?></label><br>
				<div class="select">
				  	<select name="usuario_caja">
				    	<option value="" selected="">Seleccione una opción</option>
                        <?php
                            $datos_cajas = $insLogin->seleccionarDatos("Normal", "caja", "*", 0);
                            while ($campos_caja = $datos_cajas->fetch()) {
                                echo '<option value="'.$campos_caja['caja_id'].'">Caja No.'.$campos_caja['caja_numero'].' - '.$campos_caja['caja_nombre'].'</option>';
                            }
                        ?>
				  	</select>
				</div>
		  	</div>
		</div>
		<p class="has-text-centered">
			<button type="reset" class="button is-link is-light is-rounded"><i class="fas fa-paint-roller"></i> &nbsp;Limpiar</button>
			<button type="submit" class="button is-info is-rounded"><i class="far fa-save"></i> &nbsp;Guardar</button>
		</p>
		<p class="has-text-centered pt-6">
            <small><b><u>Los campos marcados con</u></b><?php echo CAMPO_OBLIGATORIO; ?><b><u>son obligatorios</u></b></small>
        </p>
	</form>
	<?php } else { ?>
		<p class="has-text-centered has-text-danger"><i class="fas fa-exclamation-triangle"></i> No tienes permisos para registrar nuevos usuarios.</p>
	<?php } ?>
</div>