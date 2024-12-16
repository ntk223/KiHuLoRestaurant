<?php
include_once 'controllers/MenuController.php';
$menu = new MenuController();
$category_id = isset($_GET['cate']) ? $_GET['cate'] : 'all';
$role = isset($_GET['role']) ? $_GET['role'] : 'customer';
if ( $role=='customer')
{
    // Xử lý hiển thị review của món ăn
    if ($page == 'item_reviews') {
        $menuController = new MenuController();
        $menuController->showItemReviews($_GET['item_id']);
    }

    // Xử lý thêm review
    if ($page == 'add_review') {
        $menuController = new MenuController();
        $menuController->addReview($_GET['item_id']);
    }

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
            $menu->reviewItem();
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