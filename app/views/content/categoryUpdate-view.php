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
	<h1 class="title">CATEGORÍAS</h1>
	<h2 class="subtitle"><i class="fas fa-sync-alt"></i> &nbsp;Actualizar categoría:</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
	
		include "./app/views/inc/btn_back.php";

		$id=$insLogin->limpiarCadena($url[1]);

		$datos=$insLogin->seleccionarDatos("Unico","categoria","categoria_id",$id);

		if($datos->rowCount()==1){
			$datos=$datos->fetch();
	?>

	<h2 class="title has-text-centered"><?php echo $datos['categoria_nombre']." (".$datos['categoria_ubicacion'].")"; ?></h2>

	<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/categoriaAjax.php" method="POST" autocomplete="off" >

		<input type="hidden" name="modulo_categoria" value="actualizar">
		<input type="hidden" name="categoria_id" value="<?php echo $datos['categoria_id']; ?>">

		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>NOMBRE<?php echo CAMPO_OBLIGATORIO; ?></label>
				  	<input class="input" type="text" name="categoria_nombre" value="<?php echo $datos['categoria_nombre']; ?>" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>UBICACIÓN</label>
				  	<input class="input" type="text" name="categoria_ubicacion" value="<?php echo $datos['categoria_ubicacion']; ?>" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}" maxlength="150" >
				</div>
		  	</div>
		</div>
		<p class="has-text-centered">
			<button type="submit" class="button is-success is-rounded"><i class="fas fa-sync-alt"></i> &nbsp;Actualizar</button>
		</p>
		<p class="has-text-centered pt-6">
            <small><b><u>Los campos marcados con</u></b><?php echo CAMPO_OBLIGATORIO; ?><b><u>son obligatorios</u></b></small>
        </p>
	</form>
	<?php
		}else{
			include "./app/views/inc/error_alert.php";
		}
	?>
</div>