<?php
include_once "controllers/CartController.php";
$cart = new CartController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
switch ($action) {
    case 'index':
        $cart->getItemList();
        break;
    case 'add':
        $cart->addItem();
        break;
    case 'delete':
        $cart->deleteCartitem();
        break;
    case 'update':
        $cart->updateCartitem();
        break;
    default:
        echo "Action not found";
        break;
}

?>