<?php
$manage = isset($_GET['manage']) ? $_GET['manage'] : "home";
include "controllers/UserController.php";
$userController = new UserController();
switch($manage){
    case "register":
        $userController->register();
        break;
    case "login":
        $userController->login();
        break;
    case "home":
        include "views/user/menu.php";
        break;
    
}
?>