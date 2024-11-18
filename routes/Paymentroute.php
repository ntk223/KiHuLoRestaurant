<?php
include_once 'controllers/PaymentController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$paymentController = new PaymentController();
switch ($action) {
    case 'index':
        $paymentController->getAllPayments();
        break;
    case 'detail':
        break;
    case 'update':
        break;
    case 'delete':
        echo "This is delete page";
        break;
    default:
        echo "Page not found";
        break;
}
?>