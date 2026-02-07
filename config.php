<?php
define('BASE_URL', '/php/fryzjer');
$host = getenv('DB_HOST') ?: 'localhost';
$db   = getenv('DB_NAME') ?: 'fryzjer_db';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';

define('SMTP_HOST', 'sandbox.smtp.mailtrap.io');
define('SMTP_USER', 'twoj_login');
define('SMTP_PASS', 'twoje_haslo');
define('SMTP_PORT', 2525);

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Błąd połączenia z bazą: " . $e->getMessage());
}