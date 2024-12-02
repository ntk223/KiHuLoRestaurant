<?php
include_once 'controllers/UserController.php';
$user = new UserController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
switch ($action) {
    case 'index':
        $user->getUserlist();
        //include_once "views/admin/manage_users.php";
        break;
    case 'add':
        $user->addUser();
        break;
    case 'update':
        $user->updateUser();
        break;
    case 'delete':
        $user->deleteUser();
        break;
    case 'statisticCustomer':
        $user->statisticCustomer();
        break;
    case 'historyCus' :
        $user->historyCus();
        break;
    default:
        echo "Page not found";
        break;
}

?>