<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../app/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

require_once '../app/core/EnvLoader.php';
\App\Core\EnvLoader::load(__DIR__ . '/../.env');
require_once '../config.php';

// .htaccess
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';

switch ($url) {
    case 'home':
        $controller = new \App\Controllers\HomeController();
        $controller->index();
        break;

    case 'register':
        $auth = new \App\Controllers\AuthController($pdo);
        $auth->showRegister();
        break;

    case 'register/store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new \App\Controllers\AuthController($pdo);
            $auth->storeRegister();
        } else {
            header("Location: " . BASE_URL . "/login");
            exit;
        }
        break;
    
    case 'login':
        $auth = new \App\Controllers\AuthController($pdo);
        $auth->showLogin();
        break;

    case 'login/store':
        $auth = new \App\Controllers\AuthController($pdo);
        $auth->storeLogin();
        break;

    case 'logout':
        $auth = new \App\Controllers\AuthController($pdo);
        $auth->logout();
        break; 

    case 'services':
        $controller = new \App\Controllers\ServiceController($pdo);
        $controller->index();
        break;
        
    case 'admin':
        echo "Witaj w panelu Admina :)";
        break;
    
    default:
        http_response_code(404);
        echo "<h1>404</h1><p>Strona nie została odnaleziona.</p>";
        echo "<p>Szukana ścieżka: " . htmlspecialchars($url) . "</p>";
        break;
}