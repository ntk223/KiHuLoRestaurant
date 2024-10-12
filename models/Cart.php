 
<?php
include_once "config/database.php";
class Cart{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getCartItem(){
        $id = $_SESSION['user_id'];
        $query = "SELECT * cartitems WHERE cart_id = '$id'" ;
        $result = $this->db->Select($query);
        
    }
    public function addItem(){

    }
    public function updateCartitem(){

    }
}
?>