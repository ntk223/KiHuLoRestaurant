<?php
include_once "config/database.php";
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
        $query = "SELECT * FROM menuitems WHERE item_id='$id'";
        $result = $this->db->Select($query);
        return $result->fetch_assoc();
    }
    public function getItemByCategory($category_id)
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
            $image_url = 'assets/images/'.$_FILES['image_url']['name'];
            $description = $_POST['description'];
            $available = $_POST['available'];
            $query = "INSERT INTO menuitems (category_id, item_name, price, image_url, description, available) VALUES ('$category_id', '$item_name', '$price', '$image_url', '$description', '$available')";
            $result = $this->db->Insert($query);
            header("Location: index.php?role=admin&manage=menu");
            //return $result;
        }
        return false;
    }

    public function updateMenuItem($id)
    {
        if ( isset($_POST['submit']))
        {
            $item_name = $_POST['item_name'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $available = $_POST['available'];
            $description = $_POST['description'];
            $query = "UPDATE menuitems SET category_id='$category_id', item_name='$item_name', price='$price', description='$description', available='$available' WHERE item_id='$id'";
            if ( isset($_FILES['image_url']['name']))
            {
                $image_url = 'assets/images/'.$_FILES['image_url']['name'];
                $query = "UPDATE menuitems SET category_id='$category_id', item_name='$item_name', price='$price', image_url='$image_url', description='$description', available='$available' WHERE item_id='$id'";

            }
            $result = $this->db->Update($query);
            header("Location: index.php?role=admin&manage=menu");
        }
        return false;
    }
    public function deleteMenuItem($id)
    {
        $query = "DELETE FROM menuitems WHERE item_id='$id'";
        $result = $this->db->Delete($query);
        return $result;
    }

    public function statisticCategory()
    {
        $sql = "SELECT 
            CASE
                WHEN category_id = 1 THEN 'Món chính'
                WHEN category_id = 2 THEN 'Món khai vị'
                WHEN category_id = 3 THEN 'Món chính'
                ELSE 'Nước uống'
            END AS 'Loại món',
            COUNT(*) AS 'Số lượng món',
            CONCAT(ROUND(COUNT(*) / total_items * 100, 2),'%') AS 'Phần trăm loại món ăn'
        FROM menuitems,
            (SELECT COUNT(*) AS total_items FROM menuitems) AS total
        GROUP BY category_id";
        $result = $this->db->Query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo $row['Loại món'] . " - " . $row['Số lượng món'] . " - " . $row['Phần trăm loại món ăn'] . "<br>";
            }
        } else {
            echo "Không có dữ liệu.";
        }

    }


}
?>

