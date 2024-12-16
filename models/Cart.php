 
<?php
include_once "config/database.php";
class Cart{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getCartItem(){
        $id = $_SESSION['user_id'];
        $check = "SELECT * FROM carts WHERE customer_id = '$id'";
        $exist = $this->db->Select($check);
        if( $exist == false || !( $exist->num_rows > 0)){
            $query = "INSERT INTO carts (customer_id) VALUES ('$id')";
            $result = $this->db->Insert($query);
        }

        $query =   "SELECT mi.item_id,ci.cart_id, mi.item_name, mi.price, ci.quantity
                    FROM users u
                    INNER JOIN carts c ON c.customer_id = u.user_id
                    INNER JOIN cartitems ci ON c.cart_id = ci.cart_id
                    INNER JOIN menuitems mi ON mi.item_id = ci.item_id
                    WHERE u.user_id = '$id'";
        $result = $this->db->Select($query);
        return $result;
        
    }
    public function addItem(){
        $item_id = $_GET['id'];
        $id = $_SESSION['user_id'];
        $check = "SELECT * FROM carts WHERE customer_id = '$id'";
        $exist = $this->db->Select($check);
        $cart_id = -1 ;
        if( $exist == false || !( $exist->num_rows > 0)){
            $query = "INSERT INTO carts (customer_id) VALUES ('$id')";
            $result = $this->db->Insert($query);
            $cart_id = $this->db->conn->insert_id;
        }
        else{
            $cart_id = $exist->fetch_assoc()['cart_id'];
        }
        $quantity = $_POST['quantity'];
        $query = "SELECT * FROM cartitems WHERE cart_id = '$cart_id' AND item_id = '$item_id'";
        $result = $this->db->Select($query);

        if($result){
            $query = "UPDATE cartitems SET quantity = quantity + '$quantity' WHERE cart_id = '$cart_id' AND item_id = '$item_id'";
            $result = $this->db->Update($query);
            //header("Location: index.php?role=customer&page=menu");
        }
        else{
            $query = "INSERT INTO cartitems (cart_id, item_id, quantity) 
                        VALUES ('$cart_id', '$item_id','$quantity' )";
            $result = $this->db->Insert($query);
        }
        header("Location: index.php?role=customer&page=menu");
    }
    public function deleteItem() {
        $cart_id = $_GET['cid'];
        $query = "DELETE FROM cartitems WHERE item_id = '$_GET[id]' AND cart_id = '$cart_id'";
        $result = $this->db->Delete($query);
        header("Location: index.php?role=customer&page=cart");
    }
    public function updateItem(){
        $cart_id = $_GET['cid'];
        $quantity = $_POST['quantity'];
        $query = "UPDATE cartitems SET quantity = '$quantity' WHERE item_id = '$_GET[id]' AND cart_id = '$cart_id'";
        $result = $this->db->Update($query);
        header("Location: index.php?role=customer&page=cart");
    }

    public function addCombo() {
        $combo_id = $_GET['id'];
        $id = $_SESSION['user_id'];
        $check = "SELECT * FROM carts WHERE customer_id = '$id'";
        $exist = $this->db->Select($check);
        $cart_id = -1;
        if ($exist == false || !$exist->num_rows > 0) {
            $query = "INSERT INTO carts (customer_id) VALUES ('$id')";
            $this->db->Insert($query);
            $cart_id = $this->db->conn->insert_id;
        } else {
            $cart_id = $exist->fetch_assoc()['cart_id'];
        }
        $quantity = $_POST['quantity'];
        // Kiểm tra combo đã tồn tại trong giỏ hàng chưa
        $query = "SELECT * FROM cartcombos WHERE cart_id = '$cart_id' AND combo_id = '$combo_id'";
        $result = $this->db->Select($query);
    
        if ($result && $result->num_rows > 0) {
            // Combo đã tồn tại, tăng số lượng
            $query = "UPDATE cartcombos SET quantity = quantity + '$quantity' 
                      WHERE cart_id = '$cart_id' AND combo_id = '$combo_id'";
            $this->db->Update($query);
        } else {
            // Combo chưa tồn tại, thêm mới
            $query = "INSERT INTO cartcombos (cart_id, combo_id, quantity) 
                      VALUES ('$cart_id', '$combo_id', '$quantity')";
            $this->db->Insert($query);
        }
    
        header("Location: index.php?role=customer&page=combo");
    }

    public function deleteCombo() {
        $cart_id = $_GET['cid']; // ID giỏ hàng
        $combo_id = $_GET['id']; // ID combo được truyền từ URL
    
        // Thực hiện truy vấn xóa combo trong giỏ hàng
        $query = "DELETE FROM cartcombos WHERE combo_id = '$combo_id' AND cart_id = '$cart_id'";
        $this->db->Delete($query);
    
        header("Location: index.php?role=customer&page=cart");
    }
    
    public function updateCombo() {
        $cart_id = $_GET['cid']; // ID giỏ hàng
        $combo_id = $_GET['id']; // ID combo
        $quantity = $_POST['quantity']; // Số lượng mới từ form
    
        // Thực hiện truy vấn cập nhật số lượng combo
        $query = "UPDATE cartcombos SET quantity = '$quantity' 
                  WHERE combo_id = '$combo_id' AND cart_id = '$cart_id'";
        $this->db->Update($query);
    
        header("Location: index.php?role=customer&page=cart");
    }
    
    public function getComboItems() {
        $id = $_SESSION['user_id'];
        $check = "SELECT * FROM carts WHERE customer_id = '$id'";
        $exist = $this->db->Select($check);
    
        if ($exist == false || !($exist->num_rows > 0)) {
            $query = "INSERT INTO carts (customer_id) VALUES ('$id')";
            $this->db->Insert($query);
        }
    
        // Truy vấn danh sách combo
        $query = "SELECT 
                    c.cart_id,
                    cb.combo_id,
                    cb.combo_name,
                    cb.discount,
                    CEIL(SUM(mi.price * cbi.quantity) * (1 - cb.discount / 100)) AS price_each,
                    cc.quantity as quantity
                FROM 
                    combos cb
                JOIN 
                    comboitems cbi ON cbi.combo_id = cb.combo_id
                JOIN 
                    menuitems mi ON mi.item_id = cbi.item_id
                JOIN 
                    cartcombos cc ON cc.combo_id = cb.combo_id
                JOIN
                    carts c ON c.cart_id = cc.cart_id
                WHERE cb.combo_id IN
                    (SELECT cc.combo_id
                    FROM cartcombos cc
                    JOIN carts c ON c.cart_id = cc.cart_id
                    JOIN users u ON u.user_id = c.customer_id
                    WHERE u.user_id = '$id')
                GROUP BY 
                    cb.combo_id, cb.combo_name;";
        $result = $this->db->Select($query);
    
        return $result;
    }
    
    
}
?>