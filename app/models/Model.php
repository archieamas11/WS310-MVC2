<?php
require_once "../config/database.php";

class Model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function insert($table, $data) {
        if (!is_array($data) || empty($data)) {
            return false;
        }

        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        $stmt = $this->db->conn->prepare($sql);
        return $stmt->execute(array_values($data));
    }
}
?>
