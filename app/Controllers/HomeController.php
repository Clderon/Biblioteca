<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        $viewPath = BASE_PATH . '/app/Views/Home/home.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "La vista de inicio no se encontró.";
        }
    }

    public function about()
    {
        $viewPath = BASE_PATH . '/app/Views/Home/about.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "La vista de about no se encontró.";
        }
    }

    public function services()
    {
        $viewPath = BASE_PATH . '/app/Views/Home/services.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "La vista de services no se encontró.";
        }
    }

    public function contact()
    {
        $viewPath = BASE_PATH . '/app/Views/Home/contact.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "La vista de contact no se encontró.";
        }
    }
}
