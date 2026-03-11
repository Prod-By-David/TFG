<style>
.pagination-link.is-current {
    background-color: #B01B00;
    border-color: #000;
    color: #fff;
}
</style>

<div class="container is-fluid mb-6">
	<h1 class="title">CAJAS</h1>
	<h2 class="subtitle"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;Lista de cajas:</h2>
</div>

<div class="container pb-6 pt-6">

	<?php
		use app\controllers\cashierController;

		// Verificar si el usuario tiene rol de Administrador
		if ($_SESSION['usuario'] !== "Administrador") {
			echo '<p class="has-text-centered has-text-danger"><i class="fas fa-exclamation-triangle"></i> No tienes permisos para acceder a esta sección.</p>';
			exit();
		}

		$insCaja = new cashierController();

		echo $insCaja->listarCajaControlador($url[1], 15, $url[0], "");
	?>
</div>