<?php
include_once 'controllers/OrderController.php';
$orderController = new OrderController();
$role = isset($_GET['role']) ? $_GET['role'] : 'admin';
if ($role == "admin") {
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';
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
        case 'statistic':
            $orderController->statistic();
            break;
        default:
            echo "Page not found";
            break;
    }
}

else {
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';
    switch ($action) {
        case 'index':
            $orderController->getOrderByUser();
            break;
        case 'create':
            include_once 'views/user/order.php';
            break;
        case 'confirm':
            $orderController->createOrder();
            break;
        case 'detail':
            $orderController->orderDetail();
            break;
        case 'cancel':
            $orderController->cancelOrder();
            break;
        default:
            echo "Page not found";
            break;
    }
}

?>