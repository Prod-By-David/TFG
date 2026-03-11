<?php
	
	// Se incluye el archivo de configuración de la aplicación.
	require_once "../../config/app.php";
	// Se incluye el archivo que inicia la sesión de usuario.
	require_once "../views/inc/session_start.php";
	// Se incluye el archivo que realiza la carga automática de clases.
	require_once "../../autoload.php";
	
	// Se utiliza el espacio de nombres del controlador de la empresa.
	use app\controllers\companyController;

	// Se verifica si se ha enviado una petición POST con el campo 'modulo_empresa'.
	if(isset($_POST['modulo_empresa'])){

		// Se crea una instancia del controlador de la empresa.
		$insEmpresa = new companyController();

		// Se verifica si el valor de 'modulo_empresa' es "registrar".
		if($_POST['modulo_empresa']=="registrar"){
			// Se llama al método 'registrarEmpresaControlador' y se imprime el resultado.
			echo $insEmpresa->registrarEmpresaControlador();
		}

		// Se verifica si el valor de 'modulo_empresa' es "actualizar".
		if($_POST['modulo_empresa']=="actualizar"){
			// Se llama al método 'actualizarEmpresaControlador' y se imprime el resultado.
			echo $insEmpresa->actualizarEmpresaControlador();
		}
		
	}else{
		// Si no se envió el campo 'modulo_empresa', se destruye la sesión.
		session_destroy();
		// Se redirige al usuario a la página de login.
		header("Location: ".APP_URL."login/");
	}