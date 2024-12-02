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
        $paymentController->updatePaymentStatus();
        break;
    case 'delete':
        $paymentController->deletePayment();
        break;
    case 'showTotalPayments':
        $paymentController->showTotalPayments();
        break;
    case 'revenue':
        $paymentController->revenue();
        break;
    case 'paymentStatistics':
        $paymentController->statisticPayment();
        break;
    default:
        echo "Page not found";
        break;
}
?>