<?php
namespace App\Controllers;

use App\Core\Controller;
use Reservation;

class AdminController extends Controller {
    private $reservationModel;

    public function __construct($pdo) {
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            header("Location: " . BASE_URL . "/home");
            exit;
        }

        require_once '../app/models/Reservation.php';
        $this->reservationModel = new \Reservation($pdo);
    }

    public function index() {
        $reservations = $this->reservationModel->getAllWithDetails();

        $this->view('admin/dashboard', [
            'title' => 'Panel Administratora',
            'reservations' => $reservations
        ]);
    }

    public function changeStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['reservation_id'];
            $status = $_POST['status']; 

            $this->reservationModel->updateStatus($id, $status);
            
            header("Location: " . BASE_URL . "/admin");
            exit;
        }
    }
}