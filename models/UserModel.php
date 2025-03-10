<?php
require_once "../config/database.php";

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function insert($table, $data) {
        if (!is_array($data) || empty($data)) {
            return false; // Prevent empty or invalid inserts
        }

        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        $stmt = $this->db->conn->prepare($sql);
        return $stmt->execute(array_values($data));
    }
}
?>