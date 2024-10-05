<?php 
include_once 'config/session.php';
//Session::checkLogin();
//include_once "controllers/LoginController.php";

if (isset($_GET['role']))
{
    $role = $_GET['role'];
    if ($role == "customer")
    {
        include_once 'common/header.php';
        include_once 'routes/Userroute.php';
        include_once 'common/footer.php';
    }
    else if ($role == "admin")
    {
        include_once 'routes/Adminroute.php';
    }
}
else{
    include_once 'controllers/LoginController.php';
}

?>