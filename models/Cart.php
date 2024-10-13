 
<?php
include_once "config/database.php";
class Cart{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getCartItem(){
        $id = $_SESSION['user_id'];
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
        $query =   "SELECT mi.item_name, mi.price, ci.quantity, c.total
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
        $user_id = $_SESSION['user_id'];
        $quantity = $_POST['quantity'];
        $query = "SELECT * FROM cartitems WHERE cart_id = '$user_id' AND item_id = '$item_id'";
        $result = $this->db->Select($query);
        if($result->num_rows > 0){
            $query = "UPDATE cartitems SET quantity = quantity + '$quantity' WHERE cart_id = '$user_id' AND item_id = '$item_id'";
            $result = $this->db->Update($query);
            //header("Location: index.php?role=customer&page=menu");
        }
        else{
            $query = "INSERT INTO cartitems (cart_id, item_id, quantity, price) 
                        VALUES ('$user_id', '$item_id','$quantity', 0 )";
            $result = $this->db->Insert($query);
        }
        header("Location: index.php?role=customer&page=menu");
    }
    public function updateCartitem(){

    }

}
?>