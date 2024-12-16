<?php
include_once "models/Cart.php";
class CartController{
    private $cart;
    public function __construct(){
        $this->cart = new Cart();
    }
    public function getItemList(){
        $result = $this->cart->getCartItem();
        include "views/user/cart.php";
    }
    public function getComboList(){
        $combo_result = $this->cart->getComboItems();
        include "views/user/cart.php";
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
    public function addCombo() {
        $combo = $this->cart->addCombo();
    }
    
    public function deleteCombo() {
        $combo = $this->cart->deleteCombo();
    }
    
    public function updateCombo() {
        $combo = $this->cart->updateCombo();
    }
    

}
?>