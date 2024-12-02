<?php
include_once "models/Delivery.php";

class  DeliveryController {
    private $deli;

    public function __construct() {
        $this->deli = new Delivery();
    }

    public function getAllDeliveries() {
        $result = $this->deli->getDeliveries();
        include_once "views/admin/manage_deliveries.php";
    }

    public function getDeliveryDetail() {
        $id = $_GET['id'];
        $result = $this->deli->DeliveryDetail($id);
        include_once "views/admin/deliverydetail.php";
    }

    public function updateStatus() {
        $id = $_POST['submit'];
        $this->deli->updateStatus($id);
    } 

    //Thống kê giao hàng
    public function statisticDeli() {
        $totalship = $this->deli->getDelifee();
        $avgDeliveryTime =$this->deli->getAverageDeliveryTime();
        $successShipperRate = $this->deli->getSuccessShip();
        $statusShip = $this->deli->getStatusShip();
        $addressShip = $this->deli->getMostShipAddress();
        include_once "views/admin/statisticDelivery.php";
    }

}
 ?>