<?php

namespace App\Controllers;

use App\Config\DatabaseConnection;  // Importar la clase DatabaseConnection

class AuthController
{
    public function showLogin()
    {
        $viewPath = BASE_PATH . '/app/Views/auth/login.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "La vista de login no se encontró.";
        }
    }

    public function showRegister()
    {
        $viewPath = BASE_PATH . '/app/Views/auth/register.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "La vista de login no se encontró.";
        }
    }

    public function showForgotPassword()
    {
        $viewPath = BASE_PATH . '/app/Views/auth/forgot_password.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "La vista de login no se encontró.";
        }
    }

    public function login()
    {
        // Iniciar la sesión
        session_start();

        // Verificar que se recibieron los datos del formulario
        if (!isset($_POST['email'], $_POST['password'])) {
            $error = "Por favor, complete todos los campos.";
            require_once BASE_PATH . '/app/Views/auth/login.php';
            return;
        }

        // Obtener la conexión a la base de datos
        $db = DatabaseConnection::getInstance();

        // Obtener las credenciales del formulario y sanitizer
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        // Consultar la base de datos para verificar las credenciales
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        // Verificar si el usuario existe y si la contraseña es correcta
        if ($user && password_verify($password, $user['password'])) {
            // Guardar información del usuario en la sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

            // Redirigir al home después de iniciar sesión
            header('Location: /Biblioteca/home');
            exit;
        } else {
            // Volver a mostrar el formulario con un mensaje de error
            $error = "Correo electrónico o contraseña incorrectos.";
            require_once BASE_PATH . '/app/Views/auth/login.php';
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header('Location: /Biblioteca/login');
        exit;
    }

    public function showHome()
    {
        // Verificar si el usuario está autenticado
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /Biblioteca/login');
            exit;
        }

        // Cargar la vista del home
        require_once BASE_PATH . '/app/Views/home.php';
    }
}
