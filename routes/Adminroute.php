<?php
$manage = isset($_GET['manage']) ? $_GET['manage'] : 'index';
switch ($manage) {
    case 'index':
        include_once "views/admin/dashboard.php";
        break;
    case 'customer':
        include_once "routes/Userroute.php";
        break;
    case 'order':
        include_once "routes/Orderroute.php";
        break;
    case 'menu':
        include_once "routes/Menuroute.php";
        break;
    case 'delivery':
        include_once "routes/Deliroute.php";
        break;
    case 'payment':
        include_once "routes/Paymentroute.php";
        break;
    case 'review':
        include_once "routes/Reviewroute.php";
        break;
    default:
        echo "Page not found";
        break;
}

?>