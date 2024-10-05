<?php
include "config/database.php";
class MenuItem
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getMenuItem()
    {
        $query = "SELECT * FROM menuitems";
        $result = $this->db->Select($query);
        return $result;
    }
    public function getMenuItemById($id)
    {
        $query = "SELECT * FROM menuitems WHERE id=$id";
        $result = $this->db->Select($query);
        return $result;
    }
    public function getMenuItemByCategory($category_id)
    {
        $query = "SELECT * FROM menuitems WHERE category_id='$category_id'";
        $result = $this->db->Select($query);
        return $result;
    }
    public function addMenuItem()
    {
        if ( isset($_POST['submit']))
        {
            $category_id = $_POST['category_id'];
            $item_name = $_POST['item_name'];
            $price = $_POST['price'];
            $image_url = $_POST['image_url'];
            $description = $_POST['description'];
            $query = "INSERT INTO menuitems (category_id, item_name, price, image_url, description) VALUES ('$category_id', '$item_name', '$price', '$image_url', '$description')";
            $result = $this->db->Insert($query);
            return $result;
        }
        return false;
    }

    public function updateMenuItem($id)
    {
        if ( isset($_POST['submit']))
        {
            $item_name = $_POST['item_name'];
            $price = $_POST['price'];
            $image_url = $_POST['image_url'];
            $description = $_POST['description'];
            $query = "UPDATE menuitems SET category_id='$category_id', item_name='$item_name', price='$price', image_url='$image_url', description='$description' WHERE id=$id";
            $result = $this->db->Update($query);
            return $result;
        }
        return false;
    }
    public function deleteMenuItem($id)
    {
        $query = "DELETE FROM menuitems WHERE id=$id";
        $result = $this->db->Delete($query);
        return $result;
    }


}
?>

