<?php
	
// Inicia el script PHP.
	require_once "../../config/app.php";
	// Incluye el archivo "app.php" desde la carpeta "config" dos niveles arriba en la estructura de directorios. 
    // Este archivo probablemente contiene configuraciones globales de la aplicación, como constantes o la URL base.
	require_once "../views/inc/session_start.php";
	// Incluye el archivo "session_start.php" desde la carpeta "inc" dentro de "views". 
    // Este archivo probablemente inicia una sesión o gestiona la sesión del usuario.
	require_once "../../autoload.php";
	// Incluye el archivo "autoload.php" desde dos niveles arriba en la estructura de directorios. 
    // Este archivo probablemente maneja la carga automática de clases para el proyecto.
	
	use app\controllers\categoryController;
	// Usa el espacio de nombres `app\controllers` para hacer referencia a la clase `categoryController`. 
    // Esto facilita la creación de instancias de `categoryController` más adelante.

	if(isset($_POST['modulo_categoria'])){
	// Comprueba si existe la clave 'modulo_categoria' en la matriz `$_POST`, 
    // lo que indica que se ha enviado un formulario relacionado con el módulo de categoría.

		$insCategory = new categoryController();
		// Crea una instancia de `categoryController` y la almacena en la variable `$insCategory`.

		if($_POST['modulo_categoria']=="registrar"){
			echo $insCategory->registrarCategoriaControlador();
			// Si el valor de `modulo_categoria` es "registrar", se llama al método `registrarCategoriaControlador()` de `$insCategory`.
            // El resultado de este método es enviado al navegador con `echo`.
		}

		if($_POST['modulo_categoria']=="eliminar"){
			echo $insCategory->eliminarCategoriaControlador();
			// Si el valor de `modulo_categoria` es "eliminar", se llama al método `eliminarCategoriaControlador()` de `$insCategory`.
            // El resultado de este método es enviado al navegador con `echo`.
		}

		if($_POST['modulo_categoria']=="actualizar"){
			echo $insCategory->actualizarCategoriaControlador();
			// Si el valor de `modulo_categoria` es "actualizar", se llama al método `actualizarCategoriaControlador()` de `$insCategory`.
            // El resultado de este método es enviado al navegador con `echo`.
		}
		
	}else{
		session_destroy();
		// Si `modulo_categoria` no está presente en `$_POST`, se destruye la sesión actual.
		header("Location: ".APP_URL."login/");
		// Redirige al usuario a la página de login utilizando una constante `APP_URL` definida probablemente en `app.php`.
	}