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
            END AS 'category_name',
            COUNT(*) AS 'num_of_item',
            CONCAT(ROUND(COUNT(*) / (SELECT COUNT(*) FROM menuitems) * 100, 2), '%') AS 'rate'
        FROM menuitems
        GROUP BY category_id";


        $result = $this->db->Select($sql);

        if ($result->num_rows > 0)
        {
            return $result;
        }
        return false;
    }

    public function statisticItem() {
        $query = "SELECT 
                    mi.item_name, 
                    SUM(o.quantity) AS total_sales,
                    ROUND(AVG(r.rating), 1) AS avg_rating
                FROM 
                    menuitems mi
                LEFT JOIN 
                    orderitems o ON o.item_id = mi.item_id
                LEFT JOIN
                    reviews r ON r.item_id = mi.item_id
                GROUP BY 
                    mi.item_name
                ORDER BY 
                    total_sales DESC;
                ";
        $result = $this->db->Select($query);
        if ($result->num_rows > 0)
        {
            return $result;
        }
        return false;
    }

    public function avgRating() {
        $query = "SELECT ROUND(AVG(r.rating), 1) as rating
                    FROM menuitems mi
                    JOIN reviews r ON r.item_id = mi.item_id
                    ";
        $result = $this->db->Select($query);
        if ($result->num_rows > 0)
        {
            return $result->fetch_assoc()['rating'];
        }
    }

    public function reviewbyIditem($id)
    {
        $query = "SELECT u.username, mi.item_name, r.rating, r.review_text, r.review_date
                FROM reviews r
                JOIN menuitems mi ON mi.item_id = r.item_id
                JOIN users u ON u.user_id = r.customer_id
                WHERE mi.item_id = '$id'";
        $result = $this->db->Select($query);
        if ($result)
        {
            return $result;
        }
        return false;
    }

    public function search()
    {
        if (isset($_GET['action']) && $_GET['action'] == 'search') 
        {
            $query = "SELECT * FROM menuitems WHERE 1 ";
            if (isset($_POST['item_id']) && $_POST['item_id'] != '') 
            {
                $item_id = $_POST['item_id'];
                $query .= " AND item_id = '$item_id' ";
            }
            if (isset($_POST['item_name']) && $_POST['item_name'] != '') 
            {
                $item_name = $_POST['item_name'];
                $query .= " AND item_name LIKE '%$item_name%' ";
            }
            if (isset($_POST['category_id']) && $_POST['category_id'] != '') 
            {
                $category_id = $_POST['category_id'];
                $query .= " AND category_id = '$category_id' ";
            }
            if (isset($_POST['price']) && $_POST['price'] != '') 
            {
                $price = $_POST['price'];
                $query .= " AND price = '$price' ";
            }
            if (isset($_POST['available']) && $_POST['available'] != '') 
            {
                $available = $_POST['available'];
                $query .= " AND available = '$available' ";
            }
            //$query .= " ORDER BY user_id DESC";

            $result = $this->db->Select($query);
            if ($result)
            {
                return $result;
            }
            return false;
        }
    }

    public function searchForUser() {
        if (isset($_GET['page']) && $_GET['page'] == 'search') 
        {
            $query = "SELECT * FROM menuitems WHERE 1 ";
            if (isset($_POST['item_name']) && $_POST['item_name'] != '') 
            {
                $item_name = $_POST['item_name'];
                $query .= " AND item_name LIKE '%$item_name%' ";
            }
            $result = $this->db->Select($query);
            if ($result)
            {
                return $result;
            }
            return false;
        }
    }

}
?>

