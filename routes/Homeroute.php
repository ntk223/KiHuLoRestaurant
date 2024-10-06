<?php
include_once 'controllers/UserController.php';
include_once 'controllers/MenuController.php';
$page = isset($_GET['page']) ? $_GET['page'] : 'index';

switch ($page) {
    case 'index':
        $index = new MenuController();
        $index->Menulist();
        break;
    case 'menu':
        include_once 'routes/Menuroute.php';
    default:
        echo "Page not found";
        break;
}
?>