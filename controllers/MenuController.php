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
        include "views/user/menu.php";
    }
    public function ItembyCategory($category_id)
    {
        $result = $this->menuitem->getItemByCategory((int)$category_id);
        include "views/user/menu.php";
    }
    public function add()
    {

    }
    public function update()
    {

    }
    public function delete()
    {

    }
}
?>