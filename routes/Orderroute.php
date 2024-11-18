<?php
include_once 'controllers/OrderController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$orderController = new OrderController();
switch ($action) {
    case 'index':
        $orderController->getAllOrders();
        break;
    case 'detail':
        $orderController->orderDetail();
        break;
    case 'update':
        $orderController->updateStatus();
        break;
    case 'delete':
        echo "This is delete page";
        break;
    default:
        echo "Page not found";
        break;
}
?>