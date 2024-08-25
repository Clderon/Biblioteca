<?php

namespace App\Controllers;

use App\Config\DatabaseConnection;  // Importar la clase DatabaseConnection

class AuthController
{
    public function showLogin()
    {
        require_once BASE_PATH . '/app/views/auth/login.php';
    }

    public function login()
    {
        // Obtener la conexión a la base de datos
        $db = DatabaseConnection::getInstance();

        // Obtener las credenciales del formulario
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Consultar la base de datos para verificar las credenciales
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch();

        // Verificar si el usuario existe y si la contraseña es correcta
        if ($user && password_verify($password, $user['password'])) {
            // Iniciar sesión
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

            // Redirigir al home después de iniciar sesión
            header('Location: /home');
            exit;
        } else {
            // Volver a mostrar el formulario con un mensaje de error
            $error = "Correo electrónico o contraseña incorrectos";
            require_once BASE_PATH . '/app/views/login.php';
        }
    }

    // Puedes agregar otros métodos como showRegister, logout, etc.
}
