<?php
include_once 'config/Database.php';
class Delivery {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getDeliveries() {

        $query = "SELECT * FROM deliveries";
        $res = $this->db->Select($query);
        if (  $res ) {
            return $res;
        } else {
            return false;
        }
    }

    public function DeliveryDetail($id) {
        $query = "SELECT 
        u.username, u.phone, 
        s.shipper_name, s.shipper_phone, 
        d.delivery_address, d.delivery_time
        FROM deliveries d
        JOIN orders o ON o.order_id = d.order_id
        JOIN users u ON o.customer_id = u.user_id
        JOIN shipper s on s.shipper_id = d.shipper_id
        WHERE d.delivery_id = '$id'";

        $result = $this->db->Select($query);
        if (  $result ) {
            return $result;
        } else {
            return false;
        }
    }
}
?>