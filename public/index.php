<?php
require_once '../app/core/EnvLoader.php';
\App\Core\EnvLoader::load(__DIR__ . '/../.env');
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

//.htaccess
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';

echo "<h3>System rezerwacji</h3>";
echo "Aktualna ścieżka: <strong>" . $url . "</strong><br><br>";

switch($url){
    case 'home':
        echo "Strona główna";
        break;

   case 'register':
    include '../views/user/register.php';
    include '../views/layout.php';
    break;

    case 'register/store':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "Dane odebrane! Teraz czas je zapisać.";
     }
    break;
    
    case 'admin':
        echo "Witaj w panelu Admina :)";
        break;
    
    default:
        http_response_code(404);
        echo "Bład 404: Nie odnaleziono strony";
        break;
}