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

}
 ?>