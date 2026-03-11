<?php
	
	// Se incluye el archivo de configuración de la aplicación
	require_once "../../config/app.php";
	// Se incluye el archivo para iniciar la sesión del usuario
	require_once "../views/inc/session_start.php";
	// Se incluye el archivo que autoload.php para cargar automáticamente las clases necesarias
	require_once "../../autoload.php";
	
	// Se usa el namespace app\controllers y se importa la clase searchController
	use app\controllers\searchController;

	// Se verifica si existe la variable POST 'modulo_buscador'
	if(isset($_POST['modulo_buscador'])){

		// Se crea una instancia del controlador searchController
		$insBuscador = new searchController();

		// Si la variable POST 'modulo_buscador' es igual a "buscar"
		if($_POST['modulo_buscador']=="buscar"){
			// Se llama al método iniciarBuscadorControlador y se muestra su resultado
			echo $insBuscador->iniciarBuscadorControlador();
		}

		// Si la variable POST 'modulo_buscador' es igual a "eliminar"
		if($_POST['modulo_buscador']=="eliminar"){
			// Se llama al método eliminarBuscadorControlador y se muestra su resultado
			echo $insBuscador->eliminarBuscadorControlador();
		}
		
	}else{
		// Si no existe la variable POST 'modulo_buscador', se destruye la sesión
		session_destroy();
		// Redirige al usuario a la página de login
		header("Location: ".APP_URL."login/");
	}