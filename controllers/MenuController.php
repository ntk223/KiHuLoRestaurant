<?php
include "models/MenuItem.php";include_once 'controllers/ReviewController.php'; // Bao gồm ReviewController để xử lý review

class MenuController
{
    private $menuitem;
    private $reviewController;

    public function __construct()
    {
        $this->menuitem = new MenuItem();
        $this->reviewController = new ReviewController(); 
    }
    
    public function Menulist()
    {
        $result = $this->menuitem->getMenuItem();
        $role = isset($_GET['role']) ? $_GET['role'] : 'customer';
        if ($role== 'customer') include_once "views/user/menu.php";
        else include_once "views/admin/manage_menu.php";
    }
    public function ItembyCategory($category_id)
    {
        $result = $this->menuitem->getItemByCategory((int)$category_id);
        include "views/user/menu.php";
    }
    public function addItem()
    {
        include_once "views/admin/addtoMenu.php";
        $result = $this->menuitem->addMenuItem();
    }
    public function updateItem()
    {
        $id = $_GET['id'];
        $result = $this->menuitem->getMenuItemById($id);
        include_once "views/admin/editMenu.php";
        $this->menuitem->updateMenuItem($id);
    }
    public function deleteItem()
    {
        $id = $_GET['id'];
        $result = $this->menuitem->deleteMenuItem($id);
        header("Location: index.php?role=admin&manage=menu");
    }

    public function reviewItem()
    {
        $id = $_GET['id'];
        $result = $this->menuitem->reviewbyIditem($id);
        include_once "views/admin/reviewItem.php";
    }

    public function searchItem()
    {
        $result = $this->menuitem->search(); 
        include_once "views/admin/manage_menu.php";
    }

    // Phương thức hiển thị món ăn và các review của nó
public function showItemReviews($item_id)
{
    // Lấy thông tin món ăn từ MenuItem
    $item = $this->menuitem->getMenuItemById($item_id); // Đảm bảo phương thức này trả về một kết quả đúng

    // Lấy tất cả các review của món ăn này từ ReviewController
    $reviews = $this->reviewController->getReviewsByItemId($item_id);

    // Bao gồm view để hiển thị
    include_once "views/user/item_reviews.php";
}

public function addReview($item_id)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $rating = $_POST['rating'];
        $review_text = $_POST['review_text'];
        $customer_id = $_SESSION['user_id']; // Giả sử người dùng đã đăng nhập

        // Thêm review vào cơ sở dữ liệu thông qua ReviewController
        $this->reviewController->addReview($customer_id, $item_id, $rating, $review_text);

        // Sau khi thêm review, chuyển hướng về trang chi tiết món ăn để hiển thị review mới
        header("Location: index.php?role=customer&page=item_reviews&item_id=" . $item_id);
        exit(); // Quan trọng, tránh lỗi khi chuyển hướng
    }
}


public function ItemReviews()
{
    // Lấy item_id từ URL
    $item_id = isset($_GET['item_id']) ? $_GET['item_id'] : null;
    
    if ($item_id) {
        // Lấy review của món ăn từ model
        $reviews = $this->menuitem->getReviewsByItem($item_id); // Phương thức lấy reviews từ DB
        include "views/user/item_reviews.php"; // Gọi view để hiển thị reviews
    } else {
        echo "Không tìm thấy món ăn!";
    }
}


}
?>