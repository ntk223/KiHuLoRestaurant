<?php
include_once 'controllers/DeliveryController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$deliveryController = new DeliveryController();
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
?>