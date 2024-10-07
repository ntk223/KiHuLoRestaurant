<?php 
include_once 'config/session.php';
Session::init();

if (isset($_GET['role']))
{
    $role = $_GET['role'];
    if ($role == "customer")
    {
        Session::checkSession();
        include_once 'routes/Homeroute.php';

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
        include_once 'controllers/LoginController.php';
    }
}

?>