<?php
namespace App\Controllers;

use App\Core\Controller;
use User;

class AuthController extends Controller {
    private $userModel;

    public function __construct($pdo) {
        require_once "../app/models/User.php";
        $this->userModel = new \User($pdo);
    }

    public function showRegister() {
        if (isset($_SESSION['user_id'])) {
        header("Location: " . BASE_URL . "/home");
        exit;
    }
        $this->view('user/register', ['title'=>'Logowanie']);
    }

    public function storeRegister() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->userModel->exists($email)) {
                die("Email zajęty!");
            }

            if ($this->userModel->create($name, $email, $password)) {
                header("Location: " . BASE_URL . "/login");
                exit;
            }else{
                echo "Wystąpił błąd rejestracji.";
            }
        
        }
    }
 public function showLogin() {
    if (isset($_SESSION['user_id'])) {
        header("Location: " . BASE_URL . "/home");
        exit;
    }
    $this->view('user/login',['title'=> 'Logowanie']);
}

public function storeLogin() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        
        $user = $this->userModel->login($email, $password);

        if ($user) {
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] =$user['email'];
            $_SESSION['user_role'] = $user['role']; 

            
            header("Location: " . BASE_URL . "/home");
            exit;
        } else {
            
            echo "<div class='alert alert-danger'>Błędny login lub hasło! <a href='".BASE_URL."/login'>Spróbuj ponownie</a></div>";
        }
    }
}

public function logout() {
    session_destroy();
    header("Location: " . BASE_URL . "/login");
    exit;
}
}