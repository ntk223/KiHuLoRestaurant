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