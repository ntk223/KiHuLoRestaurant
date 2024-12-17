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

    public function searchItem()
    {
        $result = $this->menuitem->search(); 
        include_once "views/admin/manage_menu.php";
    }

    public function searchForUser() {
        $result = $this->menuitem->searchForUser(); 
        include_once "views/user/menu.php";
    }

    public function viewItemReviews($item_id)
{
    // Gọi hàm từ Model để lấy các review của món ăn theo item_id
    $reviews = $this->menuitem->getReviewsByItemId($item_id); 
    // Lấy thông tin chi tiết món ăn
    $menuItem = $this->menuitem->getMenuItemById($item_id);
    // Hiển thị trang reviews
    include "views/admin/reviews_list.php";
}

}
?>