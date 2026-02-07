<?php
namespace App\Controllers;

use App\Core\Controller;
use Reservation;
use Service;

class BookingController extends Controller{
    private $reservationModel;
    private $servceModel;


    public function __construct($pdo){
        require_once '../app/models/Reservation.php';
        require_once '../app/models/Service.php';

        $this->reservationModel = new \Reservation($pdo);
        $this->servceModel = new \Service($pdo);
    }

    public function index(){
        if (!isset($_SESSION['user_id'])){
            header("Location: " . BASE_URL . "/login");
            exit;
        }

        $reservations = $this->reservationModel->getByUserId($_SESSION['user_id']);

        $this->view('booking/index',[
            'title'=>'Moje Rezerwacje',
            'reservations'=> $reservations
        ]);
    }

    public function create(){
        if (!isset($_SESSION['user_id'])){
            header("Location: ". BASE_URL . "/login");
            exit;
        }

        $serviceId = $_GET['service_id'] ?? null;
        if(!$serviceId){
            die("Nie wybrano usługi");
        }
        $service = $this->servceModel->getById($serviceId);

        $this->view('booking/create',[
            'title'=>'Rezerwacja Wizity',
            'service'=>$service
        ]);
    }

   public function store() {
        if (!isset($_SESSION['user_id'])) {
            die("Musisz być zalogowany!");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $serviceId = $_POST['service_id'];
            $date = $_POST['reservation_date'];
            $userId = $_SESSION['user_id'];

            if (strtotime($date) < time()) {
                die("Nie można rezerwować wizyt w przeszłości! <a href='javascript:history.back()'>Wróć</a>");
            }

            if ($this->reservationModel->create($userId, $serviceId, $date)) {
                header("Location: " . BASE_URL . "/home");
            } else {
                echo "Błąd zapisu.";
            }
        }
    }

    
}