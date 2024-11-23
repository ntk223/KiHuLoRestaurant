 <?php
include_once 'config/Database.php';
class Payment {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getPayments() {
        $update_amount = "UPDATE payments p
        JOIN orders o ON o.order_id = p.order_id
        JOIN deliveries d ON d.order_id = p.order_id
        SET p.amount = o.total + d.delivery_fee
        ";
        $a = $this->db->Update($update_amount);
        $query = "SELECT * FROM payments";
        $res = $this->db->Select($query);
        if (  $res ) {
            return $res;
        } else {
            return false;
        }
    }

    public function updatePaymentStatus($payment_id, $payment_status) {

        $query = "UPDATE payments SET payment_status = '$payment_status' WHERE payment_id = $payment_id";
        $res = $this->db->Update($query);
        if (  $res ) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePayment($payment_id) {
        $query = "DELETE FROM payments WHERE payment_id = '$payment_id'";
        $res = $this->db->Delete($query);
        return $res;
    }

    //Tổng doanh thu
    public function getTotalPayments()
    {
        $sql = "SELECT SUM(amount) AS total_payment
                FROM payments
                WHERE payment_status = 'Thanh toán thành công'";
                
        $result = $this->db->Select($sql);

        if ($result && $result->num_rows > 0)
        {
            // Lấy hàng đầu tiên
            $row = $result->fetch_assoc();
            return $row['total_payment'];
        }
        return 0; // Trả về 0 nếu không có kết quả
    }

    // Thống kê doanh thu
    public function getRevenueByDateRange($startDate, $endDate)
    {
        $sql = "SELECT DATE(payment_time) AS payment_date, SUM(amount) AS daily_revenue
                FROM payments
                WHERE payment_status = 'Thanh toán thành công'
                AND payment_time BETWEEN '$startDate 00:00:00' AND '$endDate 23:59:59'
                GROUP BY DATE(payment_time)";
        $result = $this->db->Select($sql);

        $revenueData = [
            'total_revenue' => 0,
            'daily_revenue' => []
        ];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $revenueData['daily_revenue'][$row['payment_date']] = $row['daily_revenue'];
                $revenueData['total_revenue'] += $row['daily_revenue'];
            }
        }

        return $revenueData;
    }


    // Thống kê phương thức thanh toán phổ biến
    public function getPaymentMethodStats()
    {
        $sql = "
            SELECT 
                payment_method, 
                COUNT(*) AS method_count, 
                CONCAT(ROUND(COUNT(*) / (SELECT COUNT(*) FROM payments) * 100, 2), '%') AS method_percentage 
            FROM payments
            GROUP BY payment_method
        ";
        $result = $this->db->Select($sql);

        if ($result) {
            return $result;
        }
        return false;
    }


}
?>