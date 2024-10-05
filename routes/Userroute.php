<?php
include_once 'controllers/UserController.php';
include_once 'controllers/MenuController.php';
$user = new UserController();

$page = isset($_GET['page']) ? $_GET['page'] : 'index';

switch ($page) {
    case 'index':
        $idex = new MenuController();
        $idex->Menulist();
        break;
    case 'register':
        $user->register();
        break;
    case 'login':
        echo "This is login page";
        break;
    default:
        echo "Page not found";
        break;
}
?>