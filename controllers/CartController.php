<?php
include_once "models/Cart.php";
class CartController{
    private $cart;
    public function __construct(){
        $this->cart = new Cart();
    }
    public function getItemList(){
        $result = $this->cart->getCartItem();
        include_once "views/user/cart.php";
    }
    public function addItem(){
        $result = $this->cart->addItem();
    }
    public function deleteCartitem(){
        $result = $this->cart->deleteItem();
    }
    public function updateCartitem(){
        $result = $this->cart->updateItem();
    }

}
?>