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
}
?>