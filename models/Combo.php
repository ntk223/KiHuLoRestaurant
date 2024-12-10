<?php
include_once 'config/database.php';
Class Combo {
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function getCombo(){
        $query = "SELECT * FROM combos";
        $result = $this->db->Select($query);
        return $result;
    }
    public function getComboById0($id){
        $query = "SELECT * FROM combos WHERE combo_id = '$id'";
        $result = $this->db->Select($query);
        if ($result) return $result->fetch_assoc();
        else return false;
    }

    // detail($id){
    public function getComboById($id){
        $query = "SELECT mi.item_name, mi.image_url,cbi.combo_item_id , cbi.quantity, mi.price, cb.discount
                FROM comboitems cbi
                JOIN combos cb ON cb.combo_id = cbi.combo_id
                JOIN menuitems mi ON mi.item_id = cbi.item_id
                WHERE cb.combo_id = '$id'";
        $result = $this->db->Select($query);
        if ($result) return $result;
        else return false;
    }
    
    public function addCombo($name, $discount, $description){
        $query = "INSERT INTO combos (combo_name, discount, description) VALUES ('$name', '$discount', '$description')";
        $result = $this->db->Insert($query);
        if ($result) return true;
        else return false;
    }

    public function updateCombo($id, $name, $discount, $description){
        $query = "UPDATE combos SET combo_name = '$name', discount = '$discount', description = '$description' WHERE combo_id = '$id'";
        $result = $this->db->Update($query);
        if ($result) return true;
        else return false;
    }

    public function deleteCombo($id){
        $query = "DELETE FROM combos WHERE combo_id = '$id'";
        $result = $this->db->Delete($query);
        if ($result) return true;
        else return false;
    }

    public function addItemtoCombo($item_id , $quantity, $combo_id){
        if ($quantity <= 0) {
            header("Location: index.php?role=admin&manage=combo&action=detail&id=$combo_id");
            return false;
        }
        $query = "INSERT INTO comboitems (item_id, quantity, combo_id) VALUES ('$item_id', '$quantity', '$combo_id')";
        $result = $this->db->Insert($query);
        if ($result) return true;
        else return false;
    }

    public function deleteItem($combo_item_id, $combo_id){
        $query = "DELETE FROM comboitems WHERE combo_item_id = '$combo_item_id'";
        $result = $this->db->Delete($query);
        if ($result) return true;
        else return false;
    }

    public function updateQuantityItem($combo_item_id, $quantity){
        if ($quantity <= 0) {
            header("Location: index.php?role=admin&manage=combo&action=detail&id=$combo_id");
            return false;
        }
        $query = "UPDATE comboitems SET quantity = '$quantity' WHERE combo_item_id = '$combo_item_id'";
        $result = $this->db->Update($query);
        if ($result) return true;
        else return false;
    }
}

?>