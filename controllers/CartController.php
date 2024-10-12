<?php
include_once "models/Cart.php";
class CartController{
    private $cart;
    public function __constructor(){
        $this->cart = new Cart();
    }
    public function getItemList(){
        $this->cart->getCartItem();
        include_once "views/user/cart.php";
    }
}
?>