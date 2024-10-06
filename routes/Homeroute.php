<?php
include_once 'controllers/UserController.php';
include_once 'controllers/MenuController.php';
$page = isset($_GET['page']) ? $_GET['page'] : 'index';

switch ($page) {
    case 'index':
        $index = new MenuController();
        $index->Menulist();
        break;
    default:
        echo "Page not found";
        break;
}
?>