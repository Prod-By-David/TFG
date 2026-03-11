<?php
	
	// Se incluye el archivo de configuración de la aplicación
	require_once "../../config/app.php";
	// Se incluye el archivo que gestiona el inicio de sesión de la sesión del usuario
	require_once "../views/inc/session_start.php";
	// Se incluye el archivo que gestiona la carga automática de clases
	require_once "../../autoload.php";
	
	// Se usa el espacio de nombres para acceder al controlador de caja (cashierController)
	use app\controllers\cashierController;

	// Verifica si existe la variable POST 'modulo_caja'
	if(isset($_POST['modulo_caja'])){

		// Crea una instancia del controlador de caja (cashierController)
		$insCaja = new cashierController();

		// Verifica si el valor de 'modulo_caja' es "registrar"
		if($_POST['modulo_caja']=="registrar"){
			// Llama al método 'registrarCajaControlador' del controlador de caja e imprime su resultado
			echo $insCaja->registrarCajaControlador();
		}

		// Verifica si el valor de 'modulo_caja' es "eliminar"
		if($_POST['modulo_caja']=="eliminar"){
			 // Llama al método 'eliminarCajaControlador' del controlador de caja e imprime su resultado
			echo $insCaja->eliminarCajaControlador();
		}

		// Verifica si el valor de 'modulo_caja' es "actualizar"
		if($_POST['modulo_caja']=="actualizar"){
			// Llama al método 'actualizarCajaControlador' del controlador de caja e imprime su resultado
			echo $insCaja->actualizarCajaControlador();
		}
		
	}else{
		// Si 'modulo_caja' no está configurado en la solicitud POST, destruye la sesión actual
		session_destroy();
		// Redirige al usuario a la página de inicio de sesión
		header("Location: ".APP_URL."login/");
	}