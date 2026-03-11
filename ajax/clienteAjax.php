<?php
	
	// Incluye el archivo de configuración de la aplicación.
	require_once "../../config/app.php";
	// Inicia la sesión para el manejo de variables de sesión.
	require_once "../views/inc/session_start.php";
	// Carga automáticamente las clases que se necesiten durante la ejecución.
	require_once "../../autoload.php";
	
	// Usa la clase 'clientController' del espacio de nombres 'app\controllers'.
	use app\controllers\clientController;

	// Verifica si se ha enviado una solicitud POST con el campo 'modulo_cliente'.
	if(isset($_POST['modulo_cliente'])){

		// Crea una nueva instancia del controlador de clientes.
		$insCliente = new clientController();

		// Verifica si el valor de 'modulo_cliente' es "registrar".
		if($_POST['modulo_cliente']=="registrar"){
			// Llama al método 'registrarClienteControlador' y muestra su resultado.
			echo $insCliente->registrarClienteControlador();
		}

		// Verifica si el valor de 'modulo_cliente' es "eliminar".
		if($_POST['modulo_cliente']=="eliminar"){
			// Llama al método 'eliminarClienteControlador' y muestra su resultado.
			echo $insCliente->eliminarClienteControlador();
		}

		// Verifica si el valor de 'modulo_cliente' es "actualizar".
		if($_POST['modulo_cliente']=="actualizar"){
			// Llama al método 'actualizarClienteControlador' y muestra su resultado.
			echo $insCliente->actualizarClienteControlador();
		}
		
	}else{
		// Si 'modulo_cliente' no está establecido, destruye la sesión.
		session_destroy();
		// Redirige al usuario a la página de inicio de sesión.
		header("Location: ".APP_URL."login/");
	}