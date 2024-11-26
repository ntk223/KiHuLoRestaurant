 <?php
include_once 'config/Database.php';
class Order {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getOrders() {
        $update_total = "UPDATE orders o
                    JOIN orderitems oi ON o.order_id = oi.order_id
                    JOIN menuitems mi ON oi.item_id = mi.item_id
                    SET o.total = (
                    SELECT SUM(mi.price * oi.quantity)
                    FROM orderitems oi
                    JOIN menuitems mi ON oi.item_id = mi.item_id
                    WHERE oi.order_id = o.order_id );" ;
        $a = $this->db->Update($update_total);
        
        $query = "SELECT * FROM orders";
        $res = $this->db->Select($query);
        if (  $res ) {
            return $res;
        } else {
            return false;
        }
    }

    public function orderDetail($id) {
        $query = "
               SELECT u.username, oi.quantity, mi.item_name, mi.price
        FROM orders o
        JOIN users u 
        ON u.user_id = o.customer_id

        JOIN orderitems oi 
        ON oi.order_id = o.order_id

        JOIN menuitems mi 
        ON mi.item_id = oi.item_id
        
        WHERE o.order_id = '$id'";
        $res = $this->db->Select($query);
        if (  $res ) {
            return $res;
        } else {
            return false;
        }
    }

    public function updateStatus($id) {
        $status_arr = array(
            'processing' => 'Đang xử lý đơn hàng',
            'confirmed' => 'Đơn hàng đã xác nhận',
            'cancelled' => 'Đã hủy'
        );
        if ( isset($_POST['submit'])) {
            $res = $_POST['order_status'];
            $status = $status_arr[$res];
            $query = "UPDATE orders SET order_status='$status' WHERE order_id='$id'";
            $result = $this->db->Update($query);
            if ( $result ) {
                header("Location: index.php?role=admin&manage=order");
            }
        }
    }

    public function statistic() {
        $query = "SELECT 
                    order_status,
                    COUNT(*) AS total_orders
                FROM 
                    orders
                WHERE 
                    order_status IN ('Đã hủy', 'Đang xử lý đơn hàng', 'Đơn hàng đã xác nhận')
                GROUP BY 
                    order_status;";
        $res = $this->db->Select($query);
        if ( $res ) {
            return $res;
        } else {
            return false;
        }
    }
}
 ?>
