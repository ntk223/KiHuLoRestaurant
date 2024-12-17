 <?php
include_once 'config/database.php';
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

            if ($status == 'Đơn hàng đã xác nhận') {
                $query = "SELECT * FROM orders WHERE order_id = '$id'";
                $res = $this->db->Select($query);
                $row = $res->fetch_assoc();
                $customer_id = $row['customer_id'];
                $total = $row['total'];
                $order_time = $row['order_time'];
                // fix address
                
                //$query = "INSERT INTO deliveries (order_id, delivery_address, delivery_time, status) VALUES ('$id', ' ', '$order_time', 'pending')";
                $result = $this->db->Insert($query);
            }
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

    //Thống kê món ăn ưa thích của khách hàng
    public function getFavouriteFood() {
        $query = "SELECT 
        m.item_name,
        u.username,
        COUNT(*) AS repeat_orders
    FROM orderitems oi
    JOIN menuitems m ON oi.item_id = m.item_id
    JOIN orders o ON oi.order_id = o.order_id
    JOIN users u ON o.customer_id = u.user_id
    GROUP BY m.item_id, o.customer_id
    HAVING repeat_orders > 1
    ORDER BY repeat_orders DESC;";
        $res = $this->db->Select($query);
        if ( $res ) {
            return $res;
        } else {
            return false;
        }
    }

    //Thống kê trạng thái đơn hàng.
    public function getOrderStatusStatistics() {
        $query = "SELECT 
            order_status, 
            COUNT(*) AS total_orders,
            ROUND(COUNT(*) * 100 / (SELECT COUNT(*) FROM orders), 2) AS percentage
        FROM orders
        GROUP BY order_status
        ORDER BY total_orders DESC;";
        $result = $this->db->Select($query);
        if ($result) {
            return $result;
        }
        return false;
    }

    public function createOrder() {
        echo "hello";
        if (isset($_POST['submit'])) {
            echo "hello";
            $map = array(
                '1' => 'Tiền mặt',
                '2' => 'Thẻ tín dụng',
                '3' => 'Tài khoản ngân hàng'
            );
            // Lấy dữ liệu từ POST và kiểm tra
            $cart_id = intval($_POST['cid']);
            $total = floatval($_POST['total']);
            $address = $_POST['address'];
            $payment_method = $map[$_POST['payment_method']];
            $customer_id = intval($_SESSION['user_id']);
    
            // Tạo đơn hàng mới
            $query1 = "INSERT INTO orders (customer_id, order_status, total, order_time)
                       VALUES ('$customer_id', 'Đang xử lý', '$total', NOW())";
            $result1 = $this->db->Insert($query1);
    
            if (!$result1) {
                die("Lỗi khi tạo đơn hàng: " . $this->db->error);
            }
    
            // Lấy order_id vừa tạo
            $query2 = "SELECT LAST_INSERT_ID() AS order_id";
            $result2 = $this->db->Select($query2);
            if (!$result2) {
                die("Lỗi khi lấy mã đơn hàng: " . $this->db->error);
            }
            $order_id = $result2->fetch_assoc()['order_id'];
    
            // Thêm sản phẩm từ giỏ hàng vào đơn hàng
            $query3 = "INSERT INTO orderitems (order_id, item_id, quantity)
                       SELECT '$order_id', item_id, quantity
                       FROM cartitems
                       WHERE cart_id = '$cart_id'";
            $result3 = $this->db->Insert($query3);

            // thêm combo
            $query4 = "INSERT INTO orderitems (order_id, combo_id, quantity)
                    SELECT '$order_id', combo_id, quantity
                    FROM cartcombos
                    WHERE cart_id = '$cart_id'";
            $result4 = $this->db->Insert($query4);

    
            if (!$result3) {
                die("Lỗi khi thêm sản phẩm vào đơn hàng: " . $this->db->error);
            }
    
            // Xóa giỏ hàng
            $query5 = "DELETE FROM cartitems WHERE cart_id = '$cart_id'";
            $result5 = $this->db->Delete($query4);
    
            if (!$result5) {
                die("Lỗi khi xóa sản phẩm khỏi giỏ hàng: " . $this->db->error);
            }
    
            if (!$result5) {
                die("Lỗi khi thêm thông tin thanh toán: " . $this->db->error);
            }

            // xoa combo
            $query6 = "DELETE FROM cartcombos WHERE cart_id = '$cart_id'";
            $result6 = $this->db->Delete($query6);

            // Chuyển hướng khi thành công
            header("Location: index.php?role=customer&page=index");
            exit;
        }
        
    }

    public function getOrderByUser($user_id) {
        $query = "SELECT * FROM orders WHERE customer_id = '$user_id'";
        $res = $this->db->Select($query);
        if (  $res ) {
            return $res;
        } else {
            return false;
        }
    }
    
    
}
 ?>
