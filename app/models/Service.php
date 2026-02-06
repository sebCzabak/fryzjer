<?php
class Service {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getAll(){
        $stmt = $this->db->query("SELECT * FROM services");
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM services WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}