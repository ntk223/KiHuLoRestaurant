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

    //Thống kê thời gian giao hàng trung bình từng shipper
    public function getAverageDeliveryTime() {
        $query = "WITH AvgDeliveryTimes AS (
        SELECT 
            s.shipper_name,
            COUNT(s.shipper_id) AS sum_ship,
            AVG(TIMESTAMPDIFF(SECOND, o.order_time, d.delivery_time)) AS avg_seconds
        FROM deliveries d
        JOIN orders o ON d.order_id = o.order_id
        JOIN shipper s ON d.shipper_id = s.shipper_id
        WHERE d.status = 'Giao hàng thành công'
        GROUP BY s.shipper_id
    )
    SELECT 
        shipper_name,
        sum_ship,
        ROUND(avg_seconds, 2) AS time_ship,
        CASE
            WHEN avg_seconds < 60 THEN CONCAT(ROUND(avg_seconds, 2), ' giây')
            WHEN avg_seconds < 3600 THEN CONCAT(ROUND(avg_seconds / 60, 2), ' phút')
            WHEN avg_seconds < 86400 THEN CONCAT(ROUND(avg_seconds / 3600, 2), ' giờ')
            ELSE CONCAT(ROUND(avg_seconds / 86400, 2), ' ngày')
        END AS avg_time
    FROM AvgDeliveryTimes
    ORDER BY avg_seconds ASC;";
        $result = $this->db->Select($query);

        if ($result->num_rows > 0)
        {
            return $result;
        }
        return false;
    }

    //Thống kê tỉ lệ thành công giao hàng của từng shipper
    public function getSuccessShip() {
        $query = "SELECT 
        s.shipper_name, 
        COUNT(d.delivery_id) AS total_deliveries, 
        SUM(CASE WHEN d.status = 'Giao hàng thành công' THEN 1 ELSE 0 END) AS successful_deliveries, 
        CONCAT(ROUND(SUM(CASE WHEN d.status = 'Giao hàng thành công' THEN 1 ELSE 0 END) / COUNT(d.delivery_id) * 100, 2), '%') AS success_rate 
    FROM shipper s
    JOIN deliveries d ON s.shipper_id = d.shipper_id
    GROUP BY s.shipper_id
    ORDER BY success_rate DESC;";
    $result = $this->db->Select($query);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    //Thống kê ttỉ lệ các trạng thái giao hàng
    public function getStatusShip() {
        $query = "SELECT 
    d.status, 
    COUNT(*) AS total_deliveries, 
    CONCAT(ROUND(COUNT(*) / (SELECT COUNT(*) FROM deliveries) * 100, 2), '%') AS status_percentage 
FROM deliveries d
GROUP BY d.status;";
    $result = $this->db->Select($query);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getMostShipAddress() {
        $query = "SELECT 
        d.delivery_address,
        COUNT(*) AS total_deli,
        ROUND(COUNT(*) / total_deliveries * 100, 2) AS percent
    FROM deliveries d, 
        (SELECT COUNT(*) AS total_deliveries FROM deliveries) total_deliveries
    GROUP BY d.delivery_address, total_deliveries
    HAVING total_deli > 0
    ORDER BY total_deli DESC;";
    $result = $this->db->Select($query);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

}
?>