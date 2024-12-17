<?php
include_once 'controllers/DeliveryController.php';
$deliveryController = new DeliveryController();

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$role = isset($_GET['role']) ? $_GET['role'] : 'admin';
if ($role == 'admin') {
    switch ($action) {
        case 'index':
            $deliveryController->getAllDeliveries();
            break;
        case 'detail':
            $deliveryController->getDeliveryDetail();
            break;
        case 'update':
            $deliveryController->updateStatus();
            break;
        case 'delete':
            echo "This is delete page";
            break;
        case 'statisticDelivery':
            $deliveryController->statisticDeli();
            break;
        default:
            echo "Page not found 123";
            break;
    }
}
else {
    switch ($action) {
        case 'index':
            $deliveryController->getDeliveryByUser();
            break;
        case 'create':
            include_once 'views/user/delivery.php';
            break;
        case 'confirm':
            $deliveryController->createDelivery();
            break;
        case 'add':
            $deliveryController->addDelivery();
            break;
        case 'delete':
            $deliveryController->deleteDelivery();
            break;
        default:
            echo "Page not found";
            break;
    }
}

?>