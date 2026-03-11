<?php

// Asegurar que la sesión está iniciada antes de acceder a $_SESSION
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si APP_URL está definida para evitar errores en redirecciones
if (!defined('APP_URL')) {
    define('APP_URL', '/'); // Ajusta esto según tu proyecto
}

// Verificar si hay un usuario en sesión
if (!isset($_SESSION['usuario'])) {
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        echo json_encode(["status" => "error", "message" => "Acceso denegado. Debes iniciar sesión."]);
    } else {
        header("Location: " . APP_URL . "login/");
    }
    exit();
}

// Obtener usuario en sesión y limpiar espacios
$usuario_actual = trim($_SESSION['usuario']);

// Determinar si el usuario es administrador (ignorar mayúsculas/minúsculas)
$es_admin = (strcasecmp($usuario_actual, "administrador") === 0);

// Definir permisos y visibilidad de opciones del menú
$restricciones = [
    "crear_cajas"         => $es_admin, 
    "crear_usuarios"      => $es_admin, 
    "actualizar_cajas"    => $es_admin, 
    "eliminar_cajas"      => $es_admin, 
    "actualizar_usuarios" => $es_admin, 
    "eliminar_usuarios"   => $es_admin, 
    "listar_usuarios"     => $es_admin, 
    "buscar_usuarios"     => $es_admin, 
    "editar_compañia"     => $es_admin, 

    // Estos permisos son accesibles para todos los usuarios
    "listar_cajas"   => true,
    "buscar_cajas"   => true,
    "clientes"       => true,
    "categorias"     => true,
    "productos"      => true,
    "ventas"         => true,
];

// Opciones del menú que deben ocultarse para usuarios NO administradores
$opciones_menu = [
    "menu-cajas"         => "crear_cajas",
    "menu-usuarios"      => "crear_usuarios",
    "menu-configuracion" => "editar_compañia",
];

/**
 * Función para verificar permisos
 * @param string $permiso Nombre del permiso a verificar
 */
function verificarPermiso($permiso) {
    global $restricciones;

    if (!isset($restricciones[$permiso]) || !$restricciones[$permiso]) {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            echo json_encode(["status" => "error", "message" => "Acceso denegado. No tienes permisos para esta acción."]);
        } else {
            echo "<script>
                    alert('Acceso denegado. No tienes permisos para realizar esta acción.');
                    window.location.href = '" . APP_URL . "dashboard/';
                  </script>";
        }
        exit();
    }
}

?>