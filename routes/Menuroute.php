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
        default:
            echo "Page not found";
            break;
}
}

?>