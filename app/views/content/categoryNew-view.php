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
	<h1 class="title">CATEGORÍAS</h1>
	<h2 class="subtitle"><i class="fas fa-tag fa-fw"></i> &nbsp;Nueva categoría:</h2>
</div>

<div class="container pb-6 pt-6">

	<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/categoriaAjax.php" method="POST" autocomplete="off" >

		<input type="hidden" name="modulo_categoria" value="registrar">

		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>NOMBRE<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="categoria_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>UBICACIÓN</label>
				  	<input class="input" type="text" name="categoria_ubicacion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}" maxlength="150" >
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