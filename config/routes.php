<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;

// Obtener la ruta solicitada y el método HTTP
$requestUri = str_replace('/Biblioteca', '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$requestMethod = $_SERVER['REQUEST_METHOD'];


// Incluir manualmente el archivo del controlador si no usas autoloading
require_once BASE_PATH . '/app/Controllers/AuthController.php';
require_once BASE_PATH . '/app/Controllers/HomeController.php';


// Instancia controladores necesarios
$authController = new AuthController();
$homeController = new HomeController();

// Definir las rutas
$routes = [
    'GET' => [
        '/' => [$homeController, 'index'],
        '/home' => [$homeController, 'index'],
        '/about' => [$homeController, 'about'],
        '/services' => [$homeController, 'services'],
        '/contact' => [$homeController, 'contact'],
    ]
];

// Manejar la solicitud
if (isset($routes[$requestMethod][$requestUri])) {
    call_user_func($routes[$requestMethod][$requestUri]);
} else {

    // Manejar 404 - Ruta no encontrada
    header("HTTP/1.0 404 Not Found");

    // Incluir la página de error personalizada
    $errorPagePath = BASE_PATH . '/app/Views/404.php';
    require_once $errorPagePath;

    exit;
}
