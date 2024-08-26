<?php

// Definir la ruta base del proyecto
define('BASE_PATH', dirname(__DIR__));

// Habilitar la visualización de errores (solo en desarrollo)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Incluir archivos de configuración
require_once BASE_PATH . '/config/bootstrap.php';
require_once BASE_PATH . '/config/routes.php';

