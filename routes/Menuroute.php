<?php
include_once 'controllers/MenuController.php';
$menu = new MenuController();
$category_id = isset($_GET['cate']) ? $_GET['cate'] : 'all';
$role = isset($_GET['role']) ? $_GET['role'] : 'customer';
if ( $role=='customer')
{
    if ($category_id == 'all'){
        header ("Location: index.php?role=customer&page=index");
    }
    else{
        $menu->ItembyCategory($category_id);
    }
}
else if ($role == 'admin' )
{
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';
    switch ($action) {
        case 'index':
            $menu->Menulist();            
            break;
        case 'add':
            $menu->addItem();
            break;
        case 'update':
            $menu->updateItem();
            break;
        case 'delete':
            $menu->deleteItem();
            break;
        case 'statistic':
            include_once "views/admin/statisticCategory.php";
            break;
        case 'review':
            $item_id = $_GET['id']; // Lấy ID của món ăn từ URL
            $menu->viewItemReviews($item_id); // Gọi phương thức để hiển thị review của món ăn
            break;
        case 'search':
            $menu->searchItem();
            break;
        default:
            echo "Page not found";
            break;
}
}

?>