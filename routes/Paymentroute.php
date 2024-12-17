<?php
include_once 'controllers/PaymentController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$role = isset($_GET['role']) ? $_GET['role'] : 'admin';
$paymentController = new PaymentController();
if ($role == 'admin') {
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
}

else {
    switch ($action) {
        case 'index':
            $paymentController->getPaymentByUser();
            break;
        case 'confirm':
            $paymentController->confirmPayment();
            break;
        default:
            echo "Page not found";
            break;
    }
}

?>