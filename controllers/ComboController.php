<?php
include_once 'models/Combo.php';

Class ComboController{
    private $combo;
    public function __construct(){
        $this->combo = new Combo();
    }
    public function getComboList(){
        $result = $this->combo->getCombo();
        include_once 'views/admin/manage_combo.php';
    }

    public function comboDetail(){
        $id = $_GET['id'];
        $result = $this->combo->getComboById($id);
        include_once 'views/admin/combo_detail.php';
    }

    public function addCombo() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['combo_name'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            $result = $this->combo->addCombo($name, $discount, $description);
            if ($result) header("Location: index.php?role=admin&manage=combo");
            else echo "Failed";
        }
        else include_once 'views/admin/add_combo.php';
    }

    public function updateCombo() {
        //include_once 'views/admin/update_combo.php';
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['combo_name'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            $result = $this->combo->updateCombo($id, $name, $discount, $description);
            if ($result) header("Location: index.php?role=admin&manage=combo");
            else echo "Failed";
        }
        else {
            $result = $this->combo->getComboById0($id);
            include_once 'views/admin/update_combo.php';
        }   
    }

    public function deleteCombo(){
        $id = $_GET['id'];
        $result = $this->combo->deleteCombo($id);
        if ($result) header("Location: index.php?role=admin&manage=combo");
        else echo "Failed";
    }

    public function addItem(){
        $item_id = $_POST['item'];
        $quantity = $_POST['quantity'];
        $combo_id = $_GET['id'];
        $result = $this->combo->addItemtoCombo($item_id, $quantity, $combo_id);
        if ($result) header("Location: index.php?role=admin&manage=combo&action=detail&id=$combo_id");
        else echo "Failed";
    }

    public function deleteItem(){
        $combo_item_id = $_GET['item_id'];
        $combo_id = $_GET['id'];
        $result = $this->combo->deleteItem($combo_item_id, $combo_id);
        if ($result) header("Location: index.php?role=admin&manage=combo&action=detail&id=$combo_id");
        else echo "Failed";
    }

    public function updateQuantityItem(){
        $combo_item_id = $_GET['item_id'];
        $quantity = $_POST['quantity'];
        $result = $this->combo->updateQuantityItem($combo_item_id, $quantity);
        if ($result) header("Location: index.php?role=admin&manage=combo&action=detail&id=".$_GET['id']);
        else echo "Failed";
    }
}
?>