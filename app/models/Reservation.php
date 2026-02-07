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

    public function getAllWithDetails(){
        $sql = "SELECT r.*, s.name as service_name, s.price,u.name as user_name, u.email
        FROM reservations r
        JOIN services s ON r.service_id = s.id
        JOIN users u ON r.user_id = u.id
        ORDER BY r.reservation_date DESC";
        return $this->db->query($sql)->fetchAll();
    }

    public function updateStatus($id,$status){
        $sql = "UPDATE reservations SET status = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$status,$id]);
    }
}