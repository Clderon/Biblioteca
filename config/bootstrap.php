<?php

$folderPath = $_SERVER['SCRIPT_NAME'];
$urlPath = $_SERVER['REQUEST_URI'];
$url = substr($urlPath, 11);


define('URL', $url);

// echo "<p>";
// // var_dump($folderPath);
// echo "</p>";
// echo "<p>";
// // var_dump($urlPath);
// echo "</p>";
// echo "<p>";
// // var_dump($url);
// echo "</p>";

// Función para cargar las variables del archivo .env
function loadEnv($path)
{
    if (file_exists($path)) {
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            putenv("$name=$value");
        }
    }
}

// Cargar variables de entorno desde el .env
loadEnv(__DIR__ . '/../.env');
