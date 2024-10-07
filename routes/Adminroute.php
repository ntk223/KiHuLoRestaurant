<?php
include_once 'controllers/UserController.php';
$user = new UserController();

$manage = isset($_GET['manage']) ? $_GET['manage'] : 'index';
switch ($manage) {
    case 'index':
        include_once "views/admin/dashboard.php";
        break;
    case 'customer':
        include_once "routes/Userroute.php";
        break;
    case 'menu':
        include_once "routes/MenuRoute.php";
        break;
    case 'edit':
        echo "This is edit page";
        break;
    case 'delete':
        echo "This is delete page";
        break;
    default:
        echo "Page not found";
        break;
}

?>