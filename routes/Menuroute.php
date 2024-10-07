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
            $user->getUserlist();
            
            break;
        case 'add':
            $user->addUser();
            break;
        case 'update':
            echo "This is edit page";
            break;
        case 'delete':
            $user->deleteUser();
            break;
        default:
            echo "Page not found";
            break;
}
}

?>