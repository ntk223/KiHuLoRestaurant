<?php
include_once "controllers/CartController.php";
$cart = new CartController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
switch ($action) {
    case 'index':
        $cart->getCartList();
        break;
    case 'add':
        $cart->addItem();
        break;
    case 'addcombo':
        $cart->addCombo();
        break;
    case 'deletecombo':
        $cart->deleteCombo();
        break;
    case 'updatecombo':
        $cart->updateCombo();
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