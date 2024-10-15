 
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
            $query = "INSERT INTO carts (customer_id, total) VALUES ('$id', 0)";
            $result = $this->db->Insert($query);
        }

        $query1 = "UPDATE carts c
                    INNER JOIN cartitems ci ON c.cart_id = ci.cart_id
                    INNER JOIN menuitems mi ON mi.item_id = ci.item_id
                    SET c.total = (
                        SELECT SUM(mi2.price * ci2.quantity)
                        FROM cartitems ci2
                        INNER JOIN menuitems mi2 ON mi2.item_id = ci2.item_id
                        WHERE ci2.cart_id = c.cart_id
                    )
                    WHERE c.customer_id = '$id'";

        $res = $this->db->Update($query1);

        $query =   "SELECT mi.item_id,ci.cart_id, mi.item_name, mi.price, ci.quantity, c.total
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
            $query = "INSERT INTO carts (customer_id, total) VALUES ('$id', 0)";
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
            $query = "INSERT INTO cartitems (cart_id, item_id, quantity, price) 
                        VALUES ('$cart_id', '$item_id','$quantity', 0 )";
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

}
?>