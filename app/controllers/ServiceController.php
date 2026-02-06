<?php
namespace App\Controllers;

use App\Core\Controller;
use Service; 

class ServiceController extends Controller {
    private $serviceModel;

    public function __construct($pdo) {
        require_once '../app/models/Service.php';
        
        $this->serviceModel = new \Service($pdo);
    }

    public function index() {
        $services = $this->serviceModel->getAll();

        $this->view('service/index', [
            'title' => 'Cennik Usług',
            'services' => $services
        ]);
    }
}