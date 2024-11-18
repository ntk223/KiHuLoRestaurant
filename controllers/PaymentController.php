<?php
include_once "models/Payment.php";

class  PaymentController {
    private $payment;

    public function __construct() {
        $this->payment = new Payment();
    }

    public function getAllPayments() {
        $result = $this->payment->getPayments();
        include_once "views/admin/manage_payments.php";
    }

}
 ?>