<?php
include_once 'controllers/UserController.php';
include_once 'controllers/MenuController.php';
$page = isset($_GET['page']) ? $_GET['page'] : 'index';
include_once 'common/header.php';
switch ($page) {
    case 'index':
        include_once "views/user/sidebar.php";
        $index = new MenuController();
        $index->Menulist();
        break;
    case 'menu':
        include_once "views/user/sidebar.php";
        include_once 'routes/Menuroute.php';
        break;
    case 'profile':
        $user= new UserController();
        $user->updateProfileUser();
        //include_once 'views/user/profile.php';
        break;
    case 'password':
        $user= new UserController();
        $user->updatePwd();
        break;
    case 'cart':
        include_once "routes/Cartroute.php";
        break;
    case 'combo':
        include_once "routes/Comboroute.php";
        break;
    case 'search':
        $mn = new MenuController();
        include_once 'views/user/sidebar.php';
        $mn->searchForUser();
        break;
    case 'review':
        include_once 'routes/Reviewroute.php';
        break;
    case 'order':
        include_once 'routes/Orderroute.php';
        break;
    case 'delivery':
        include_once 'routes/Deliroute.php';
        break;
    case 'payment':
        include_once 'routes/Paymentroute.php';
        break;
    default:
        echo "Page not found123";
        break;
}
include_once 'common/footer.php';
?>