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
	<h1 class="title">CLIENTES</h1>
	<h2 class="subtitle"><i class="fas fa-male fa-fw"></i> &nbsp;Nuevo cliente:</h2>
</div>

<div class="container pb-6 pt-6">

	<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/clienteAjax.php" method="POST" autocomplete="off" >

		<input type="hidden" name="modulo_cliente" value="registrar">

		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>TIPO DE DOCUMENTO<?php echo CAMPO_OBLIGATORIO; ?></label><br>
				  	<div class="select">
					  	<select name="cliente_tipo_documento">
					    	<option value="" selected="" >Seleccione una opción</option>
	                        <?php
	                        	echo $insLogin->generarSelect(DOCUMENTOS_USUARIOS,"VACIO");
	                        ?>
					  	</select>
					</div>
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>NÚMERO DE DOCUMENTO<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="cliente_numero_documento" pattern="[a-zA-Z0-9-]{7,30}" maxlength="30" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>NOMBRE<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="cliente_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>APELLIDO O APELLIDOS<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="cliente_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>PROVINCIA<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="cliente_provincia" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,30}" maxlength="30" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>LOCALIDAD<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="cliente_ciudad" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,30}" maxlength="30" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>DIRECCIÓN<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="cliente_direccion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{4,70}" maxlength="70" required >
				</div>
		  	</div>
		</div>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>TELÉFONO</label>
				  	<input class="input" type="text" name="cliente_telefono" pattern="[0-9()+]{8,20}" maxlength="20" >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>EMAIL</label>
				  	<input class="input" type="email" name="cliente_email" maxlength="70" >
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
</div>