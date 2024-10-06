<?php
$in = $_GET['in'];
switch ($in) {
    case 'login':
        Session::checkLogin();
        include_once 'Controllers/LoginController.php';
        break;
    case 'register':
        include_once 'Controllers/RegisterController.php';
        break;
    case 'logout':
        include_once 'Controllers/LogoutController.php';
        break;
    default:
        echo "Page not found";
        break;
}
?>