<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        $viewPath = BASE_PATH . '/app/Views/home.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "La vista de inicio no se encontró.";
        }
    }
    
    public function about()
    {
        $viewPath = BASE_PATH . '/app/Views/about.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "La vista de inicio no se encontró.";
        }
    }

    public function services()
    {
        $viewPath = BASE_PATH . '/app/Views/services.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "La vista de inicio no se encontró.";
        }
    }

    public function contact()
    {
        $viewPath = BASE_PATH . '/app/Views/contact.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "La vista de inicio no se encontró.";
        }
    }


}
