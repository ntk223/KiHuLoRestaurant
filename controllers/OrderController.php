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
        include_once "views/admin/orderdetail.php";
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
}
 ?>