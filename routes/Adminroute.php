<?php
$manage = isset($_GET['manage']) ? $_GET['manage'] : 'index';
switch ($manage) {
    case 'index':
        include "views/admin/dashboard.php";
        break;
    case 'add':
        echo "This is add page";
        break;
    case 'edit':
        echo "This is edit page";
        break;
    case 'delete':
        echo "This is delete page";
        break;
    default:
        echo "Page not found";
        break;
}

?>