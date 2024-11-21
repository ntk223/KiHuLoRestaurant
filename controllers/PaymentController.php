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

    public function updatePaymentStatus() {
        if (isset($_POST['submit'])) {
            $payment_id = $_POST['submit'];
            $payment_status = $_POST['payment_status'];
            $result = $this->payment->updatePaymentStatus($payment_id, $payment_status);
            if ($result) {
                header("Location: index.php?role=admin&manage=payment");
            } else {
                echo "Cập nhật thất bại";
            }
        }
    }

    public function deletePayment() {
        if (isset($_GET['id'])) {
            $payment_id = $_GET['id'];
            $result = $this->payment->deletePayment($payment_id);
            if ($result) {
                header("Location: index.php?role=admin&manage=payment");
            } else {
                echo "Xóa thất bại";
            }
        }
        
    }

    public function showTotalPayments()
    {
        // Lấy tổng thanh toán từ model
        $totalPayments = $this->payment->getTotalPayments();

        // Gửi dữ liệu sang view
        include './views/totalPaymentsView.php';
    }



}
 ?>