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
	<h1 class="title">CAJAS</h1>
	<h2 class="subtitle"><i class="fas fa-sync-alt"></i> &nbsp;Actualizar caja:</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
	
		include "./app/views/inc/btn_back.php";

		// Verificar si el usuario tiene permisos de Administrador o Cajero
		if ($_SESSION['usuario'] !== "Administrador" && $_SESSION['usuario'] !== "Cajero") {
			echo '<p class="has-text-centered has-text-danger"><i class="fas fa-exclamation-triangle"></i> No tienes permisos para acceder a esta sección.</p>';
			exit();
		}

		$id = $insLogin->limpiarCadena($url[1]);

		$datos = $insLogin->seleccionarDatos("Unico", "caja", "caja_id", $id);

		if ($datos->rowCount() == 1) {
			$datos = $datos->fetch();
	?>

	<h2 class="title has-text-centered"><?php echo $datos['caja_nombre']." #".$datos['caja_numero']; ?></h2>

	<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/cajaAjax.php" method="POST" autocomplete="off">

		<input type="hidden" name="modulo_caja" value="actualizar">
		<input type="hidden" name="caja_id" value="<?php echo $datos['caja_id']; ?>">

		<div class="columns">
			<div class="column">
				<div class="control">
					<label>NÚMERO DE CAJA<?php echo CAMPO_OBLIGATORIO; ?></label>
					<input class="input" type="text" name="caja_numero" pattern="[0-9]{1,5}" maxlength="5" value="<?php echo $datos['caja_numero']; ?>" required>
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>NOMBRE O CÓDIGO DE CAJA<?php echo CAMPO_OBLIGATORIO; ?></label>
					<input class="input" type="text" name="caja_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ:# ]{3,70}" maxlength="70" value="<?php echo $datos['caja_nombre']; ?>" required>
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>EFECTIVO EN CAJA<?php echo CAMPO_OBLIGATORIO; ?></label>
					<input class="input" type="text" name="caja_efectivo" pattern="[0-9.]{1,25}" maxlength="25" value="<?php echo number_format($datos['caja_efectivo'],2,'.',''); ?>" required>
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
		} else {
			include "./app/views/inc/error_alert.php";
		}
	?>
</div>