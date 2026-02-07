<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\EmailService;
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
                
                
                if (isset($_SESSION['user_email'])) {
                    $mailer = new \App\Core\EmailService();
                    
                    $to = $_SESSION['user_email'];
                    $userName = $_SESSION['user_name'] ?? 'Kliencie';
                    $formattedDate = date('d.m.Y H:i', strtotime($date));
                    
                    $subject = "Potwierdzenie rezerwacji - Fryzjero";
                    
                    
                    $body = "
                        <div style='font-family: Arial, sans-serif; color: #333;'>
                            <h2 style='color: #d39e00;'>Dziękujemy za rezerwację!</h2>
                            <p>Witaj, <strong>$userName</strong>.</p>
                            <p>Twoja wizyta została pomyślnie zarejestrowana w naszym systemie.</p>
                            
                            <div style='background: #f8f9fa; padding: 15px; border-left: 4px solid #d39e00; margin: 20px 0;'>
                                <p style='margin: 0;'><strong>Data wizyty:</strong> $formattedDate</p>
                                <p style='margin: 5px 0 0 0;'><strong>Status:</strong> <span style='color: orange;'>Oczekująca na zatwierdzenie</span></p>
                            </div>

                            <p>Otrzymasz kolejną wiadomość, gdy administrator potwierdzi termin.</p>
                            <hr>
                            <small>Pozdrawiamy, Zespół Fryzjero</small>
                        </div>
                    ";

                    
                    $mailer->send($to, $subject, $body);
                }
                

                
                header("Location: " . BASE_URL . "/booking/index?success=1");
                exit;

            } else {
                echo "Błąd zapisu w bazie danych.";
            }
        }
    }

    
}