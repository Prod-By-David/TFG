<?php
	
	// Requiere el archivo de configuración de la aplicación.
	require_once "../../config/app.php";
	// Requiere el archivo que inicia la sesión del usuario.
	require_once "../views/inc/session_start.php";
	// Requiere el archivo autoload que carga automáticamente las clases necesarias.
	require_once "../../autoload.php";
	
	// Usa la clase productController del espacio de nombres app\controllers.
	use app\controllers\productController;

	// Verifica si existe la variable POST 'modulo_producto'.
	if(isset($_POST['modulo_producto'])){

		// Crea una instancia de la clase productController.
		$insProducto = new productController();

		// Verifica si el valor de 'modulo_producto' es "registrar".
		if($_POST['modulo_producto']=="registrar"){
			// Llama al método 'registrarProductoControlador' y muestra su resultado.
			echo $insProducto->registrarProductoControlador();
		}

		// Verifica si el valor de 'modulo_producto' es "eliminar".
		if($_POST['modulo_producto']=="eliminar"){
			// Llama al método 'eliminarProductoControlador' y muestra su resultado.
			echo $insProducto->eliminarProductoControlador();
		}

		// Verifica si el valor de 'modulo_producto' es "actualizar".
		if($_POST['modulo_producto']=="actualizar"){
			// Llama al método 'actualizarProductoControlador' y muestra su resultado.
			echo $insProducto->actualizarProductoControlador();
		}

		// Verifica si el valor de 'modulo_producto' es "eliminarFoto".
		if($_POST['modulo_producto']=="eliminarFoto"){
			// Llama al método 'eliminarFotoProductoControlador' y muestra su resultado.
			echo $insProducto->eliminarFotoProductoControlador();
		}

		// Verifica si el valor de 'modulo_producto' es "actualizarFoto".
		if($_POST['modulo_producto']=="actualizarFoto"){
			// Llama al método 'actualizarFotoProductoControlador' y muestra su resultado.
			echo $insProducto->actualizarFotoProductoControlador();
		}
		
	}else{
		// Si no existe 'modulo_producto', destruye la sesión y redirige al login.
		session_destroy();
        // Redirige al usuario a la página de login usando la URL de la aplicación definida en APP_URL.
		header("Location: ".APP_URL."login/");
	}