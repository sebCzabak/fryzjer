<?php
class Reservation {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function create($userId, $serviceId, $date) {
        $sql = "INSERT INTO reservations (user_id, service_id, reservation_date, status) VALUES (?, ?, ?, 'pending')";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$userId, $serviceId, $date]);
    }
    
    public function getByUserId($userId) {
        $sql = "SELECT r.*, s.name as service_name, s.price 
                FROM reservations r 
                JOIN services s ON r.service_id = s.id 
                WHERE r.user_id = ? 
                ORDER BY r.reservation_date DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
}