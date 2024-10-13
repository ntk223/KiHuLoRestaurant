 
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

    }
    public function updateCartitem(){

    }


// UPDATE carts c
// INNER JOIN cartitems ci ON c.cart_id = ci.cart_id
// INNER JOIN menuitems mi ON mi.item_id = ci.item_id
// SET c.total = (
//     SELECT SUM(mi2.price * ci2.quantity)
//     FROM cartitems ci2
//     INNER JOIN menuitems mi2 ON mi2.item_id = ci2.item_id
//     WHERE ci2.cart_id = c.cart_id
// )
// WHERE c.customer_id = 2;

// SELECT mi.item_name, mi.price, ci.quantity, c.total
// FROM users u
// INNER JOIN carts c ON c.customer_id = u.user_id
// INNER JOIN cartitems ci ON c.cart_id = ci.cart_id
// INNER JOIN menuitems mi ON mi.item_id = ci.item_id
// WHERE u.user_id = 2;
}
?>