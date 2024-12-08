<?php
include_once 'controllers/ComboController.php';
$Combo = new ComboController();
$category_id = isset($_GET['cate']) ? $_GET['cate'] : 'all';
$role = isset($_GET['role']) ? $_GET['role'] : 'customer';
if ( $role=='customer')
{
    if ($category_id == 'all'){
        header ("Location: index.php?role=customer&page=index");
    }
    else{
        $Combo->ItembyCategory($category_id);
    }
}
else if ($role == 'admin' )
{
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';
    switch ($action) {
        case 'index':
            $Combo->getComboList();            
            break;
        case 'detail':
            $Combo->comboDetail();
            break;
        case 'additem':
            $Combo->addItem();
            break;
        case 'updateitem':
            $Combo->updateQuantityItem();
            break;
        case 'deleteitem':
            $Combo->deleteItem();
            break;
        case 'statistic':
            include_once "views/admin/statisticCategory.php";
            break;
        case 'review':
            $Combo->reviewItem();
            break;
        default:
            echo "Page not found";
            break;
}
}

?>