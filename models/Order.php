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
                // shipper_id
                $sql = "UPDATE deliveries SET status = 'Đang giao hàng', shipper_id = '21' WHERE order_id = '$id'";
                $this->db->Update($sql);
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
        if (isset($_POST['submit'])) {
            // Bản đồ phương thức thanh toán
            $map = array(
                '1' => 'Tiền mặt',
                '2' => 'Thẻ tín dụng',
                '3' => 'Tài khoản ngân hàng'
            );
    
            // Kiểm tra dữ liệu POST
            if (empty($_POST['cid']) || empty($_POST['total']) || empty($_POST['address']) || empty($_POST['payment_method'])) {
                die("Thiếu thông tin bắt buộc.");
            }
    
            // Lấy và làm sạch dữ liệu
            $cart_id = intval($_POST['cid']);
            $total = floatval($_POST['total']);
            $address = addslashes($_POST['address']); // Escape ký tự đặc biệt
            $payment_method = isset($map[$_POST['payment_method']]) ? $map[$_POST['payment_method']] : null;
            $customer_id = intval($_SESSION['user_id']);
            $delivery_fee = 15000;
    
            if (!$payment_method) {
                die("Phương thức thanh toán không hợp lệ.");
            }
    
            // 1. Tạo đơn hàng
            $query1 = "INSERT INTO orders (customer_id, order_status, total, order_time) 
                       VALUES ('$customer_id', 'Đang xử lý', '$total', NOW())";
            if (!$this->db->Insert($query1)) {
                die("Lỗi khi tạo đơn hàng: " . $this->db->error);
            }
    
            // 2. Lấy order_id vừa tạo
            $query2 = "SELECT LAST_INSERT_ID() AS order_id";
            $result2 = $this->db->Select($query2);
            if (!$result2) {
                die("Lỗi khi lấy mã đơn hàng: " . $this->db->error);
            }
            $order_id = $result2->fetch_assoc()['order_id'];
    
            // 3. Thêm sản phẩm vào đơn hàng
            $query3 = "INSERT INTO orderitems (order_id, item_id, quantity)
                       SELECT '$order_id', item_id, quantity FROM cartitems WHERE cart_id = '$cart_id'";
            if (!$this->db->Insert($query3)) {
                die("Lỗi khi thêm sản phẩm vào đơn hàng: " . $this->db->error);
            }
    
            // 4. Thêm combo vào đơn hàng
            $query4 = "INSERT INTO orderitems (order_id, combo_id, quantity)
                       SELECT '$order_id', combo_id, quantity FROM cartcombos WHERE cart_id = '$cart_id'";
            if (!$this->db->Insert($query4)) {
                die("Lỗi khi thêm combo vào đơn hàng: " . $this->db->error);
            }
    
            // 5. Xóa giỏ hàng (sản phẩm và combo)
            $query5 = "DELETE FROM cartitems WHERE cart_id = '$cart_id'";
            $query6 = "DELETE FROM cartcombos WHERE cart_id = '$cart_id'";
            if (!$this->db->Delete($query5) || !$this->db->Delete($query6)) {
                die("Lỗi khi xóa giỏ hàng: " . $this->db->error);
            }
    
            // 6. Thêm thông tin giao hàng
            $query7 = "INSERT INTO deliveries (order_id, delivery_address, delivery_fee, status)
                       VALUES ('$order_id', '$address', '$delivery_fee', 'Đang xử lý')";
            if (!$this->db->Insert($query7)) {
                die("Lỗi khi thêm thông tin giao hàng: " . $this->db->error);
            }
    
            // 7. Thêm thông tin thanh toán
            $amount = $total + $delivery_fee;
            $query8 = "INSERT INTO payments (order_id, payment_method, amount, payment_status)
                       VALUES ('$order_id', '$payment_method', '$amount', 'Đang xử lý giao dịch')";
            if (!$this->db->Insert($query8)) {
                die("Lỗi khi thêm thông tin thanh toán: " . $this->db->error);
            }
    
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
