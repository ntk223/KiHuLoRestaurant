<?php
include_once "controllers/CartController.php";
$cart = new CartController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
switch ($action) {
    case 'index':
        $cart->getItemList();
        $cart->getComboList();
        break;
    case 'add':
        $cart->addItem();
        break;
    case 'addCombo':
        $cart->addCombo();
        break;
    case 'deleteCombo':
        $cart->deleteCartitem();
        break;
    case 'updateCombo':
        $cart->updateCartitem();
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