<?php 
include_once 'config/session.php';
Session::init();

if (isset($_GET['role']))
{
    $role = $_GET['role'];
    if ($role == "customer")
    {
        Session::checkSession();
        include_once 'common/header.php';
        include_once("views/user/sidebar.php");
        include_once 'routes/Homeroute.php';
        include_once 'common/footer.php';

        //include_once 'common/footer.php';

    }
    else if ($role == "admin")
    {
        Session::checkSession();
        include_once 'routes/Adminroute.php';
    }
}
else{
    if (isset($_GET['in']))
    {
        include_once 'routes/Sessionroute.php';
    }
    else{
        include_once 'Controllers/LoginController.php';
    }
}

?>