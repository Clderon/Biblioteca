<?php

// Cargar el archivo bootstrap.php para inicializar la aplicación
require_once __DIR__ . '/../config/bootstrap.php';


// El resto de tu aplicación (rutas, controladores, etc.)

// Definir la ruta base
define('BASE_PATH', dirname(__DIR__));

// Cargar el controlador AuthController
require_once BASE_PATH . '/app/Controllers/AuthController.php';

// Crear una instancia del controlador y manejar la solicitud
$controller = new App\Controllers\AuthController();

// Llamar al método correspondiente en el controlador
$controller->showLogin();