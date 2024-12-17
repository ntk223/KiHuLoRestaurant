 <?php
include_once "models/Order.php";

class  OrderController {
    private $order;

    public function __construct() {
        $this->order = new Order();
    }

    public function getAllOrders() {
        $orders = $this->order->getOrders();
        include_once "views/admin/manage_orders.php";
    }

    public function orderDetail() {
        $id = $_GET['id'];
        $orderDetail = $this->order->orderDetail($id);
        $orderDetailCombo = $this->order->orderDetailCombo($id);
        if ($_GET['role'] == 'admin')include_once "views/admin/orderdetail.php";
        else include_once "views/user/order_detail.php";
    }

    public function updateStatus() {
        $id = $_POST['submit'];
        $this->order->updateStatus($id);
    }

    public function statistic() {
        $res = $this->order->statistic();
        $favouriteFood = $this->order->getFavouriteFood();
        $orderStatusStatistics = $this->order->getOrderStatusStatistics();
        include_once "views/admin/statisticOrder.php";
    }

    public function createOrder() {
        $this->order->createOrder();
    }

    public function getOrderByUser() {
        $result = $this->order->getOrderByUser($_SESSION['user_id']);
        include_once "views/user/order_list.php";
    }

    public function cancelOrder() {
        $this->order->cancelOrder($_POST['order_id']);
        header("Location: index.php?role=customer&page=order");
    }
}
 ?>