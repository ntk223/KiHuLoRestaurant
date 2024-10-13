<?php
$in = $_GET['in'];
switch ($in) {
    case 'login':
        Session::checkLogin();
        include_once 'controllers/LoginController.php';
        break;
    case 'register':
        include_once 'controllers/RegisterController.php';
        break;
    case 'logout':
        include_once 'controllers/LogoutController.php';
        break;
    default:
        echo "Page not found";
        break;
}
?>