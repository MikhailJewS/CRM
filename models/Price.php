<?php
//models/price.php
class Price {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Получить все цены
    public function getAllPrices() {
        $query = "SELECT p.*, pr.name AS product_name FROM prices p JOIN products pr ON p.product_id = pr.id";
        return $this->db->fetchAll($this->db->query($query));
    }

    // Добавить новую цену
    public function addPrice($product_id, $amount) {
        $query = "INSERT INTO prices (product_id, amount) VALUES ('" . $this->db->safe($product_id) . "', " . (float)$amount . ")";
        return $this->db->query($query);
    }

    // Обновить цену по ID
    public function updatePrice($id, $amount) {
        $query = "UPDATE prices SET amount = " . (float)$amount . " WHERE id = " . (int)$id;
        return $this->db->query($query);
    }

    // Удалить цену по ID
    public function deletePrice($id) {
        $query = "DELETE FROM prices WHERE id = " . (int)$id;
        return $this->db->query($query);
    }

    // Получить цену по ID
    public function getPriceById($id) {
        $query = "SELECT * FROM prices WHERE id = " . (int)$id;
        return $this->db->fetch($this->db->query($query));
    }
}
?>
