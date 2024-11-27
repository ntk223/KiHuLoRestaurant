<?php
include "models/MenuItem.php";
class MenuController
{
    private $menuitem;
    public function __construct()
    {
        $this->menuitem = new MenuItem();
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

}
?>