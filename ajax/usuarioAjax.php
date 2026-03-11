<?php
	
	// Incluye el archivo de configuración de la aplicación.
	require_once "../../config/app.php";
	// Incluye el archivo que inicia la sesión del usuario.
	require_once "../views/inc/session_start.php";
	// Incluye el archivo que realiza la carga automática de clases.
	require_once "../../autoload.php";
	
	// Usa la clase `userController` del espacio de nombres `app\controllers`.
	use app\controllers\userController;

	// Verifica si la variable `modulo_usuario` ha sido enviada a través de una solicitud POST.
	if(isset($_POST['modulo_usuario'])){

		// Crea una instancia del controlador `userController`.
		$insUsuario = new userController();

		// Verifica si el valor de `modulo_usuario` es "registrar" y llama al método correspondiente.
		if($_POST['modulo_usuario']=="registrar"){
			echo $insUsuario->registrarUsuarioControlador();
		}

		// Verifica si el valor de `modulo_usuario` es "eliminar" y llama al método correspondiente.
		if($_POST['modulo_usuario']=="eliminar"){
			echo $insUsuario->eliminarUsuarioControlador();
		}

		// Verifica si el valor de `modulo_usuario` es "actualizar" y llama al método correspondiente.
		if($_POST['modulo_usuario']=="actualizar"){
			echo $insUsuario->actualizarUsuarioControlador();
		}

		// Verifica si el valor de `modulo_usuario` es "eliminarFoto" y llama al método correspondiente.
		if($_POST['modulo_usuario']=="eliminarFoto"){
			echo $insUsuario->eliminarFotoUsuarioControlador();
		}
 		// Verifica si el valor de `modulo_usuario` es "actualizarFoto" y llama al método correspondiente.
		if($_POST['modulo_usuario']=="actualizarFoto"){
			echo $insUsuario->actualizarFotoUsuarioControlador();
		}
		// Si no se envió `modulo_usuario`, destruye la sesión y redirige al usuario a la página de inicio de sesión.
	}else{
		session_destroy();
		header("Location: ".APP_URL."login/");
	}